<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Cursos\Categoria;
use App\Models\Cursos\Destacados;
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

        $user = Categoria::create([
            'nombre' => "General",
        ]);
        User::factory(10)->create();
        Categoria::factory(10)->create();
        Curso::factory(200)->create();
        Destacados::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
