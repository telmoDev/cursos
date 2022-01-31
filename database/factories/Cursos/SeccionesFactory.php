<?php

namespace Database\Factories\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Secciones;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeccionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Secciones::class;

    public function definition()
    {
        $cantidad_curso = Curso::all()->count();
        return [
            'titulo' => $this->faker->name(),
            'cursos_id' => $this->faker->numberBetween("1", $cantidad_curso),
        ];
    }
}
