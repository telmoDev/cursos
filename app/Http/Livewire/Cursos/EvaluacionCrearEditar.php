<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Evaluacion;
use App\Models\Cursos\EvaluacionPregunta;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EvaluacionCrearEditar extends Component
{
  public $preguntas = [];
  public $evaluacion;
  public $cursos;
  public $cursoNombre;
  public $cursoSerch = "";

  public function mount($id = null)
  {

    $this->evaluacion = Evaluacion::where('id', $id)->firstOr(fn () => new Evaluacion());

    $this->cursos = Curso::all();

    $this->cursoNombre = $this->evaluacion->curso ? $this->evaluacion->curso->nombre : '';

    $preguntaslol = EvaluacionPregunta::where('curso_evaluacion_id', $this->evaluacion->id)->get();
    if (count($preguntaslol)) {
      $this->preguntas = [...$preguntaslol];
    }

  }

  protected $rules = [
    'evaluacion.titulo' => 'required',
    'preguntas.*.titulo' => 'required',

  ];

  public function agregarPregunta()
  {
    $this->preguntas[] = [
      'id' => null,
      'titulo' => '',
      'respuestas' => []
    ];
  }

  public function agregarRepuesta($key)
  {
    $this->preguntas[$key]['respuestas'][] = [
      'id' => null,
      'titulo' => '',
      'respuestas' => []
    ];
  }

  public function getDataDeCurso($idcurso, $nombre)
  {
    $this->evaluacion->cursos_id = $idcurso;
    $this->cursoNombre = $nombre;
    $this->cursoSerch = '';
  }

  public function guardar()
  {
    // $this->validate();
    $this->evaluacion->save();
  }

  public function render()
  {
    return view('livewire.cursos.evaluacion-crear-editar');
  }
}
