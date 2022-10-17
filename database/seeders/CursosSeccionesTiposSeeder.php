<?php

namespace Database\Seeders;

use App\Models\CursosSeccionesTipo;
use Illuminate\Database\Seeder;

class CursosSeccionesTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CursosSeccionesTipo::insert([
            [ 'nombre' => 'Introducción' ],
            [ 'nombre' => 'Mensaje' ],
            [ 'nombre' => 'video' ]
        ]);
    }
}
