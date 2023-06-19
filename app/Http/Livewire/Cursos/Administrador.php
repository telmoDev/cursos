<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class Administrador extends Component
{
    use WithPagination;

    public function borrar($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
    }

    public function render()
    {
        return view('livewire.cursos.administrador', [
            'cursos' => Curso::paginate(15)
        ]);
    }
}
