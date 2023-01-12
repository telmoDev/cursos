<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Evaluacion;
use App\Models\Cursos\EvaluacionPregunta;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EvaluacionCrearEditar extends Component
{
  public $preguntas;
  public $evaluacion;
  public $cursos;
  public $cursoId;
  public $cursoNombre;
  public $cursoSerch = "";

  public function mount($id = null)
  {
    // dd($id);
    $this->cursos = new Collection();
    $this->cursos = Curso::all();
    $this->evaluacion = Evaluacion::where('id', $id)->firstOr(function () { return new Evaluacion(); });

    $this->cursoId = $this->evaluacion->cursos_id;
    $this->cursoNombre = $this->evaluacion->curso ? $this->evaluacion->curso->nombre : $this->evaluacion->curso;

    $preguntas = EvaluacionPregunta::where('curso_evaluacion_id', $this->evaluacion->id)->get();
    if (count($preguntas)) {
      $this->preguntas = $preguntas;
    }

    $this->preguntas = [];
  }

  protected $rules = [
    'evaluacion.titulo' => 'required',
    'cursoId' => 'required',
  ];

  public function agregarPregunta()
  {
    $this->preguntas[] = [
      'id' => null,
      'titulo' => '',
      'respuestas' => []
    ];
  }

  // public function update($name, $value)
  // {
  //   if($name === 'getDataCurso'){
  //     $this->cursoId = $this->cursoId;
  //     $this->cursoNombre = $this->cursoNombre;
  //   }
  // }

  public function getDataCurso($id, $nombre)
  {
    // dd('Prueba');
    $this->cursoNombre = $nombre;
    $this->cursoId = $id;
    // dd($this->cursoNombre);
  }

  public function guardar()
  {
    $this->validate();
    Evaluacion::updateOrCreate(
      [ 'id' => $this->id],
      [
        'titulo' => $this->evaluacion->titulo,
        'cursos_id' => $this->cursoId
      ]
    );

  }

  public function render()
  {
    return view('livewire.cursos.evaluacion-crear-editar');
  }
}
