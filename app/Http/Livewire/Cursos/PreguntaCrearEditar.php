<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\EvaluacionPregunta;
use App\Models\Cursos\EvaluacionRespuesta;
use App\Models\Cursos\Secciones;
use Livewire\Component;

class PreguntaCrearEditar extends Component
{
  public $curso;
  public $modulos = [];
  public $cursoSerch;
  public $moduloPreguntas = [];

  public function mount($idCurso = null)
  {
    $this->curso = Curso::where('id', $idCurso)->first();
    if ($this->curso) {
      $this->modulos =  Secciones::where('cursos_id', $this->curso->id)->get();
    }

    $this->getPreguntas();
  }

  public function getPreguntas()
  {
    foreach ($this->modulos as $keyModulo => $value) {
      $this->moduloPreguntas[] = [
        'curso' => $this->curso->id,
        'modulo' => $value->id,
        'preguntas' => []
      ];
      $preguntas = EvaluacionPregunta::where('curso_id', $this->curso->id)->where('curso_seccion_id', $value->id)->get();
      foreach ($preguntas as $keyPregunta => $pregunta) {
        $this->moduloPreguntas[$keyModulo]['preguntas'][] = [
          'id' => $pregunta->id,
          'titulo' => $pregunta->titulo,
          'respuestas' => []
        ];
        $respuestas = EvaluacionRespuesta::where('pregunta_id', $pregunta->id)->get();
        foreach ($respuestas as $keyRepuesta => $respuesta) {
          $this->moduloPreguntas[$keyModulo]['preguntas'][$keyPregunta]['respuestas'][] = [
            'id' => $respuesta->id,
            'titulo' => $respuesta->titulo,
            'estado' => $respuesta->estado,
          ];
        }
      }
    }
  }

  public function agregarPregunta($key)
  {
    $this->moduloPreguntas[$key]['preguntas'][] = [
      'id' => null,
      'titulo' => '',
      'respuestas' => []
    ];
  }
  public function agregarRespuesta($key, $keyPregunta)
  {
    $this->moduloPreguntas[$key]['preguntas'][$keyPregunta]['respuestas'][] = [
      'id' => null,
      'titulo' => '',
      'estado' => false,
    ];
  }
  public function borrarPregunta($key, $keyPregunta)
  {
    unset($this->moduloPreguntas[$key]['preguntas'][$keyPregunta]);
    $this->moduloPreguntas = array_values($this->moduloPreguntas);
  }

  public function borrarRepuesta($key, $keyPregunta, $keyRepuesta)
  {
    unset($this->moduloPreguntas[$key]['preguntas'][$keyPregunta]['respuestas'][$keyRepuesta]);
    $this->moduloPreguntas = array_values($this->moduloPreguntas);
  }

  public function guarda()
  {
    foreach ($this->moduloPreguntas as $key => $modulo) {
      foreach ($modulo['preguntas'] as $key => $pregunta) {
        $idPregunta =  EvaluacionPregunta::updateOrCreate(
          ['id' =>  $pregunta['id']],
          [
            'titulo' => $pregunta['titulo'],
            'curso_seccion_id' => $modulo['modulo'],
            'curso_id' => $modulo['curso']
          ]
        );
        foreach ($pregunta['respuestas'] as $key => $respuesta) {
          EvaluacionRespuesta::updateOrCreate(
            ['id' =>  $respuesta['id']],
            [
              'titulo' => $respuesta['titulo'],
              'estado' => $respuesta['estado'],
              'pregunta_id' => $idPregunta->id,
            ]
          );
        }
      }
    }

    return redirect()->route('pregunta.crear.editar', [ $this->curso->id ]);
  }

  public function render()
  {
    return view('livewire.cursos.pregunta-crear-editar');
  }
}
