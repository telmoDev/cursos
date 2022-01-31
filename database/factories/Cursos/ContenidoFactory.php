<?php

namespace Database\Factories\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContenidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Contenido::class;

    public function definition()
    {
        $cantidad_curso = Curso::all()->count();
        $cantidad_contenido_tipo = ContenidoTipo::all()->count();

        return [
            'cursos_id' => $this->faker->numberBetween("1", $cantidad_curso),
            'cursos_contenido_tipo_id' => $this->faker->numberBetween("1", $cantidad_contenido_tipo),

            'titulo' => $this->faker->realText($maxNbChars = 100,),
            'detalle' => $this->faker->realText($maxNbChars = 200,),
        ];
    }
}
