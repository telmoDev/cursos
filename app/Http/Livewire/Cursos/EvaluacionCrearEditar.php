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

    $this->cursos = Curso::all();

  }


  public function render()
  {
    return view('livewire.cursos.evaluacion-crear-editar');
  }
}
