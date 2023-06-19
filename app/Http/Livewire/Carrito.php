<?php

namespace App\Http\Livewire;

use App\Models\PreFactura;
use App\Models\User;
use App\Models\Users\Carritos;
use App\Models\Users\MisCursos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Carrito extends Component
{
  public $idCursos;
  private $saFacNum;
  public $token;
  private $estadoPreFactura;
  public function updated($name, $value)
  {
    if ($name == 'idCursos') {
      $this->agrearAlUsuario();
    }
  }

  public function mount() {

    $this->token = $this->GenerarTokenUTEService();
    // dd($this->token);


    $saFacNum = User::GetPreFactura();
    $this->saFacNum = $saFacNum->sa_fac_num;
    // if ($this->saFacNum != null ) {
    //   $this->estadoPreFactura = PreFacturaService::ObtenerPreFactura($this->token, $this->saFacNum)->entity->estadoFactura;
    // }
  }

  public function agrearAlUsuario()
  {
    $insertar = [];
    foreach ($this->idCursos as $key => $value) {
      array_push($insertar, [
        'curso_id' => intval($value),
        'user_id' => Auth::id()
      ]);
    }
    MisCursos::insert($insertar);
  }

  public function render()
  {
    if (Auth::check()) {
      return view('livewire.carrito', [
        'carrito' => Carritos::where('user_id', Auth::user()->id)->get(),
      ]);
    } else {
      return view('livewire.carrito', [
        'carrito' => new Collection([]),
      ]);
    }
  }

  public function checkout()
  {

    $userId = Auth::user() ? Auth::user()->id : null;

    if (Carritos::where('user_id', $userId)->count() == 0)
      return;

    if ($this->saFacNum != null) {
      $this->estadoPreFactura = $this->ObtenerPreFactura($this->token, $this->saFacNum)->entity->estadoFactura;
    }

    $total = $this->ValorTotalCarito();

    if ($this->estadoPreFactura == 'ESPERA') {

      $urlPago = $this->UpdatePreFacturaQuery();
      redirect()->to($urlPago);
    }

    if ($this->estadoPreFactura == null) {
      // dd($this->token);
      $urlPago = $this->CrearPreFactura($this->token, $total);
      $urlPago = $urlPago->entity->urlPago;
      // dd( $this->CrearPreFactura($this->token, $total) );
      redirect()->to($urlPago);
    }
  }

  private function UpdatePreFacturaQuery()
  {
    $total = $this->ValorTotalCarito();
    $preFactura = $this->ActualizarPreFactura($this->token, $this->saFacNum, $total)->entity;
    $urlPago = $preFactura->urlPago;


    if ($preFactura->estadoFactura == 'ESPERA') {
      $data = [ 'estado_factura' => $preFactura->estadoFactura ];
    }

    if ($preFactura->estadoFactura == 'PAGADO') {
      $data = [
        'estado_factura' => $preFactura->estadoFactura,
        'expiro' => true
      ];
    }
    if ($preFactura->estadoFactura != null) {
      PreFactura::where("sa_fac_num", $this->saFacNum)
      ->update($data);
    }

    return $urlPago;
  }

  private function ValorTotalCarito()
  {
    $carrito = Carritos::where('user_id', Auth::user()->id)->get();
    $total='0.00';

    foreach ($carrito as $key => $value) {
      $total += $value->curso->precio;
    }

    $total =  number_format((float)$total, 2, '.', '');

    return $total;
  }

  private function eleminarCarrito($id)
  {
    $elemento = Carritos::where('id', $id)
      ->where('user_id', Auth::user()->id)->first();
    $elemento->delete();
  }



  private function GenerarTokenUTEService($usuario="xtratego")
  {
    $URL = env('URL_UTE_FACTURACION');

    $response = Http::withOptions([
      'verify' => false,
    ])->get($URL . "/Jwt/token/{$usuario}");

    $response = json_decode($response->body());

    // dd($response);

    return $response->entity;
  }

  public function ObtenerPreFactura($token, $codPreFactura)
  {
    $URL = env('URL_UTE_FACTURACION');

    $response = Http::withOptions([
      'verify' => false,
    ])
    ->withToken($token)
    ->get($URL . "/FacturaExterna/ObtenerFacturasExternasPorPagarPorNumero/{$codPreFactura}");

    $response = json_decode($response->body());

    // $this->UpdatePreFacturaQuery($codPreFactura, $response->entity->estadoFactura);

    return $response;

  }

  public function ActualizarPreFactura($token, $codPreFactura, $total)
  {
    $URL = env('URL_UTE_FACTURACION');
    $COD_USU = env('COD_USU');

    // $total = $this->ValorTotalCarito();

    $data = [
      "sa_fuc_num" => $codPreFactura,
      "valDetalle" => $total,
      "cod_usu" => $COD_USU
    ];

    $response = Http::withOptions([
      'verify' => false,
    ])
    ->withToken($token)
    ->post($URL . "/FacturaExterna/ModificarFacturaExterna", $data);

    $response = json_decode($response->body());
    return $response;
  }

  public function CrearPreFactura($token, $total)
  {
    $URL = env('URL_UTE_FACTURACION');
    $COD_USU = env('COD_USU');
    $COD_UNI = env('COD_UNI');
    $COD_SERVICIO = env('COD_SERVICIO');
    // $total = $this->ValorTotalCarito();
    $data = [
      "tipoDocumento" => Auth::user()->tipo_identificacion_id,
      "identificacion" => Auth::user()->identificacion,
      "nombres" => Auth::user()->nombres . ' ' . Auth::user()->apellidos,
      "direccion" => Auth::user()->direccion,
      "telefono" => Auth::user()->telefono,
      "email" => Auth::user()->email,
      "cod_usu" => $COD_USU,
      "cod_uni" => $COD_UNI,
      "fecha" => "2023-06-13T00:00:00",
      "detalle" => "CURSO XTRATEGO",
      "valDetalle" => $total,
      "des" => $COD_SERVICIO
    ];


      try {
        $response = Http::withOptions([
          'verify' => false,
          ])
          ->withToken($token)
          ->post($URL . '/FacturaExterna/GenerarFacturaExterna', $data);

    // dd($token);

        $response = json_decode($response->body());
      } catch (\Throwable $th) {
        $response = null;

        throw $th;
      }




    // guardar data de preFactura
    // PreFactura::create(
    //   [
    //     'sa_fac_num' => $response->entity->sa_fac_num,
    //     'url_pago' => $response->entity->urlPago,
    //     'fecha_creado' => Carbon::parse($response->entity->fecha),
    //     'user_id' => Auth::user()->id
    //   ]);

    return $response;
  }
}
