<?php

namespace Database\Seeders;

use App\Models\Cursos\ContenidoTipo;
use App\Models\TipoIdentificacion;
use Illuminate\Database\Seeder;

class Prod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ContenidoTipo::insert([
        ['titulo' => "Introduccion"],
        ['titulo' => "Video"],
        ['titulo' => "Descarga"],
        ['titulo' => "Texto"],
      ]);

      TipoIdentificacion::insert([
        [ 'nombre' => 'Cédula'],
        [ 'nombre' => 'Pasaporte'],
      ]);
    }
}
