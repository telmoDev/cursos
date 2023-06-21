<?php

namespace Database\Seeders;

use App\Models\Cursos\ContenidoTipo;
use App\Models\TipoIdentificacion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Prod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      TipoIdentificacion::insert([
        [ 'nombre' => 'Cédula'],
        [ 'nombre' => 'Pasaporte'],
      ]);
      User::create([
        'name' => "ebonifaz",
        'slug' => "ebonifaz",
        'email' => "ebonifaz@111.com.ec",
        'password' => Hash::make('enrique123'),
        'nombres' => 'nombre1 nombre2',
        'apellidos' => 'apellido1 apellido2',
        'direccion' => 'direccion de prueba',
        'identificacion' => '0987654321',
        'tipo_identificacion_id' => 1,
        'telefono' => '09876654321',
      ]);
      ContenidoTipo::insert([
        ['titulo' => "Introduccion"],
        ['titulo' => "Video"],
        ['titulo' => "Descarga"],
        ['titulo' => "Texto"],
      ]);
    }
}
