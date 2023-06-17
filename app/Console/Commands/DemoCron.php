<?php

namespace App\Console\Commands;

use App\Models\PreFactura;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DemoCron extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'demo:cron';

  private $URL = 'https://app.ute.edu.ec/gfacobranzaservicioprb/BPservicio';
  private $token;

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
    $this->token = $this->generarToken();
    echo $this->token;
    $this->preFacturas();
    return 0;
  }

  private function preFacturas()
  {
    $preFacturas =  PreFactura::all();
    foreach ($preFacturas as $key => $value) {
      $preFactura = $this->getRequestPreFactura($value->sa_fac_num);
      print_r($preFactura->entity->estadoFactura);
    }
  }

  private function getRequestPreFactura($codPreFactura) {
    try {

      $response = Http::withOptions([
        'verify' => false,
      ])
        ->withToken($this->token)
        ->get($this->URL . "/FacturaExterna/ObtenerFacturasExternasPorPagarPorNumero/{$codPreFactura}");
        $response = json_decode($response->body());
        // $response = $response->body();
      return $response;
    } catch (\Throwable $th) {
      throw $th;
    }
    // return null;
  }

  private function generarToken($usuario = 'xtratego')
  {
    try {
      $response = Http::withOptions([
        'verify' => false,
      ])->get($this->URL . "/Jwt/token/{$usuario}");
      $response = json_decode($response->body());
      return $response->entity;
    } catch (\Throwable $th) {
      throw $th;
    }
    return null;
  }
}
