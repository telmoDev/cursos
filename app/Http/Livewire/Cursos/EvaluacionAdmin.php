<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Cursos\Evaluacion;
use Livewire\Component;
use Livewire\WithPagination;

class EvaluacionAdmin extends Component
{
  use WithPagination;
  public function render()
  {
    return view('livewire.cursos.evaluacion-admin', ['evaluaciones' => Evaluacion::paginate(15)]);
  }
}
