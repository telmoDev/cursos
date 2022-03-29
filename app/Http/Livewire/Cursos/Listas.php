<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;

class Listas extends Component
{
    public function render()
    {
        return view('livewire.cursos.listas', [
            'cursos' => Curso::paginate(16 ),
        ]);
    }
}
