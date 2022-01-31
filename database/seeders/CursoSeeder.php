<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Cursos\Categoria;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use App\Models\Cursos\Destacados;
use App\Models\Cursos\Secciones;
use App\Models\User;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory(10)->create();
        Categoria::factory(10)->create();
        Curso::factory(200)->create();
        Destacados::factory(10)->create();
        Secciones::factory(500)->create();
        $new = new ContenidoTipo();
        $new->titulo = "Tipo 1";
        $new->save();
        $new = new ContenidoTipo();
        $new->titulo = "Tipo 2";
        $new->save();
        $new = new ContenidoTipo();
        $new->titulo = "Tipo 3";
        $new->save();
        $new = new ContenidoTipo();
        $new->titulo = "Tipo 4";
        $new->save();
        Contenido::factory(1000)->create();
        // \App\Models\User::factory(10)->create();
    }
}
