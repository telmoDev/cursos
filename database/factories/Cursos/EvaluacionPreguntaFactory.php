<?php

namespace Database\Factories\Cursos;

use App\Models\Cursos\EvaluacionPregunta;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluacionPreguntaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    protected $model = EvaluacionPregunta::class;

    public function definition()
    {
        $titulo = $this->faker->realText($maxNbChars = 50,);
        return [
            'titulo' => $titulo,
        ];
    }
}
