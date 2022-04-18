<?php

namespace Database\Factories\Cursos;

use App\Models\Cursos\EvaluacionRespuesta;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluacionRespuestaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = EvaluacionRespuesta::class;

    public function definition()
    {
        $titulo = $this->faker->realText($maxNbChars = 50,);
        return [
            'titulo' => $titulo,
        ];
    }
}
