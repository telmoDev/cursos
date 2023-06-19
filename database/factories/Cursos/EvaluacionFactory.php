<?php

namespace Database\Factories\Cursos;

use App\Models\Cursos\Evaluacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Evaluacion::class;

    public function definition()
    {
        $titulo = $this->faker->realText($maxNbChars = 50,);

        return [
            'titulo' => $titulo,
            'cantidad_preguntas' => 3
            //
        ];
    }
}
