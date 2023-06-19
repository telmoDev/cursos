<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Cursos\Evaluacion;
use App\Models\Cursos\EvaluacionPregunta;
use App\Models\Cursos\EvaluacionRespuesta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EvaluacionAdmin extends Component
{
  use WithPagination;
  public function render()
  {
    return view(
      'livewire.cursos.evaluacion-admin',
      [
        'evaluaciones' => EvaluacionPregunta::paginate(15)
      ]
    );
  }
}
