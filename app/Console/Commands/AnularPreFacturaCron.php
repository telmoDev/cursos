<?php

namespace App\Console\Commands;

use App\Models\PreFactura;
use App\Models\Users\Carritos;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AnularPreFacturaCron extends Command
{
  private $token;
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'anularprefactura:cron';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $this->token = $this->GenerarTokenUTE();
    $this->AnularPreFacturaQuery();
    return 0;
  }


  public function AnularPreFacturaQuery()
  {
    $prefactura = PreFactura::where('anulado', false)->get();

    foreach ($prefactura as $key => $value) {
      $toDate = Carbon::parse($value->fecha_creado);
      $fromDate = Carbon::now();
      if ($toDate->diffInDays($fromDate) >= 5) {
        $this->AnularPreFactura($this->token, $value->sa_fac_num);
        PreFactura::where('sa_fac_num', $value->sa_fac_num)
          ->update([
            'anulado' => true,
            'expiro' => true
          ]);

        Carritos::where('user_id', $value->user_id)->delete();
      }
    }
  }

  public function AnularPreFactura($token, $codPreFactura)
  {
    $URL = env('URL_UTE_FACTURACION');
    $COD_SERVICIO = env('COD_SERVICIO');

    $data = [
      "sa_fuc_num" => $codPreFactura,
      "servicio" => $COD_SERVICIO,
    ];

    $response = Http::withOptions([
      'verify' => false,
    ])
      ->withToken($token)
      ->post($URL . "/FacturaExterna/AnularFacturaExterna", $data);

    $response = json_decode($response->body());
  }


  public function GenerarTokenUTE($usuario = "xtratego")
  {
    $URL = env('URL_UTE_FACTURACION');

    $response = Http::withOptions([
      'verify' => false,
    ])->get($URL . "/Jwt/token/{$usuario}");

    $response = json_decode($response->body());

    return $response->entity;
  }
}
