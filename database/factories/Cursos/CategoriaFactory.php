<?php

namespace Database\Factories\Cursos;

use App\Models\Cursos\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Categoria::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'imagen' => $this->faker->imageUrl($width = 400, $height = 400),
        ];
    }
}
