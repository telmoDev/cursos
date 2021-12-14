<?php

namespace Database\Factories\Cursos;

use App\Models\Cursos\Destacados;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestacadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Destacados::class;

    public function definition()
    {
        return [
            'cursos_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
