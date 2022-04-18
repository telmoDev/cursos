<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;

class Evaluacion extends Component
{
    public $curso_slug;
    public $seccion;

    public $curso;
    public $mostrar_curso;

    public $contenido;

    public $pregunta_mostrar;

    public $indice;

    public $fin_de_curso = false;

    public $preguntas_respuesta = [
        'pregunta1' => [
            'pregunta' => "Ejemplo pregunta 1",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
        'pregunta2' => [
            'pregunta' => "Ejemplo pregunta 2",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
        'pregunta3' => [
            'pregunta' => "Ejemplo pregunta 3",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
        'pregunta4' => [
            'pregunta' => "Ejemplo pregunta 4",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
        'pregunta5' => [
            'pregunta' => "Ejemplo pregunta 5",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
        'pregunta6' => [
            'pregunta' => "Ejemplo pregunta 6",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
        'pregunta7' => [
            'pregunta' => "Ejemplo pregunta 7",
            'opciones' => [
                "op1" => "Ejemplo respuesta 1",
                "op2" => "Ejemplo respuesta 2",
                "op3" => "Ejemplo respuesta 33"
            ],
            'solucion' => "op3",
            'contestada' => false,
        ],
    ];

    public function mount()
    {
        $this->curso = Curso::where("slug", $this->curso_slug)->first();

        $this->indice = array_key_first( $this->preguntas_respuesta );

        $this->pregunta_mostrar = $this->preguntas_respuesta[$this->indice];
    }

    public function render()
    {
        return view('livewire.cursos.evaluacion');
    }

    public function activar_curso($contenido_id, $contenido_slug)
    {
        return redirect()->route('curso.seccion' , [$this->curso_slug, $contenido_slug ] );
    }

    public function pregunta_select( $indice )
    {
        $this->pregunta_mostrar = $this->preguntas_respuesta[$indice];
    }

    public function siguiente( )
    {
        if( $this->siguienteKeyPregunta() != -1 ){
            $this->pregunta_mostrar = $this->preguntas_respuesta[ $this->indice ];
        }
        //
    }

    public function siguienteKeyPregunta()
    {
        $indices = array_keys( $this->preguntas_respuesta );
        foreach ( $indices as $key => $indices_key) {

            if( $indices_key == $this->indice){
                if( count( $indices ) != $key + 1){
                    $this->indice = $indices[ $key + 1 ];
                    $this->preguntas_respuesta[$indices[$key]]['contestada'] = true;
                    return $indices[ $key + 1 ];
                }else{
                    if( count( $indices ) == $key + 1){
                        $this->preguntas_respuesta[$indices[$key]]['contestada'] = true;
                    }
                    $this->fin_de_curso = true;
                }
            }
        }
        return -1;
    }
}
