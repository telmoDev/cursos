<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Cursos\Categoria;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use App\Models\Cursos\Destacados;
use App\Models\Cursos\Evaluacion;
use App\Models\Cursos\EvaluacionPregunta;
use App\Models\Cursos\EvaluacionRespuesta;
use App\Models\Cursos\Secciones;
use App\Models\User;
use App\Models\Users\Aprobados;
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

        Curso::factory(25)
        ->has(
            Secciones::factory()
            ->has(Contenido::factory()->count(5))
            ->count(4)
        )
        ->has(
            Evaluacion::factory()
            ->has(
                EvaluacionPregunta::factory()
                ->has(
                    EvaluacionRespuesta::factory()
                    ->count(6)
                )
                ->count(10)
            )->count(1)

        )
        ->create();
        Destacados::factory(10)->create();
        // Secciones::factory(100)->create();

        foreach (EvaluacionPregunta::all() as $key => $pregunta) {
            $pregunta->respuesta_correcta_id = $pregunta->evaluacionRespuesta->get(2)->id;
            $pregunta->save();
        }

        $miscurso = MisCursos::create([
            'curso_id' => "2",
            'user_id' => "1",
        ]);

        Aprobados::create([
            'curso_id' => "2",
            'user_id' => "1",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);


        $miscurso = MisCursos::create([
            'curso_id' => "1",
            'user_id' => "1",
        ]);


        Aprobados::create([
            'curso_id' => "1",
            'user_id' => "1",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);

        $miscurso = MisCursos::create([
            'curso_id' => "3",
            'user_id' => "1",
        ]);

        Aprobados::create([
            'curso_id' => "3",
            'user_id' => "1",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);

        $miscurso = MisCursos::create([
            'curso_id' => "4",
            'user_id' => "1",
        ]);

        Aprobados::create([
            'curso_id' => "4",
            'user_id' => "1",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);



        // Contenido::factory(2000)->create();
        // \App\Models\User::factory(10)->create();



        $miscurso = MisCursos::create([
            'curso_id' => "2",
            'user_id' => "2",
        ]);

        Aprobados::create([
            'curso_id' => "2",
            'user_id' => "2",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);


        $miscurso = MisCursos::create([
            'curso_id' => "1",
            'user_id' => "2",
        ]);


        Aprobados::create([
            'curso_id' => "1",
            'user_id' => "2",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);

        $miscurso = MisCursos::create([
            'curso_id' => "3",
            'user_id' => "2",
        ]);

        Aprobados::create([
            'curso_id' => "3",
            'user_id' => "2",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);

        $miscurso = MisCursos::create([
            'curso_id' => "4",
            'user_id' => "2",
        ]);

        Aprobados::create([
            'curso_id' => "4",
            'user_id' => "2",
            'cursos_seccione_id' => $miscurso->curso->secciones->first()->id,
        ]);
    }
}
