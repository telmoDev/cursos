<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class Administrador extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.cursos.administrador', [
            'cursos' => Curso::paginate(15)
        ]);
    }
}
