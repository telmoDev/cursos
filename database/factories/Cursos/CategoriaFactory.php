<?php

namespace Database\Factories\Cursos;

use App\Models\Cursos\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $nombre = $this->faker->name();
        return [
            'nombre'    => $nombre,
            'slug'      => Str::slug( $nombre, '-'),
            'imagen'    => $this->faker->imageUrl($width = 400, $height = 400),
        ];
    }
}
