<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Cursos\Categoria;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use App\Models\Cursos\Destacados;
use App\Models\Cursos\Secciones;
use App\Models\User;
use App\Models\Users\MisCursos;
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

        Curso::factory(70)
        ->has(
            Secciones::factory()
            ->has(Contenido::factory()->count(5))
            ->count(4)

        )
        ->create();
        Destacados::factory(10)->create();
        // Secciones::factory(100)->create();

        MisCursos::create([
            'curso_id' => "2",
            'user_id' => "1",
        ]);

        MisCursos::create([
            'curso_id' => "1",
            'user_id' => "1",
        ]);

        MisCursos::create([
            'curso_id' => "3",
            'user_id' => "1",
        ]);

        MisCursos::create([
            'curso_id' => "4",
            'user_id' => "1",
        ]);


        // Contenido::factory(2000)->create();
        // \App\Models\User::factory(10)->create();
    }
}
