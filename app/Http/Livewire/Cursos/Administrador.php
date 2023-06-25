<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class Administrador extends Component
{

    use WithPagination;
    
    public function reloadPage()
    {
        $this->emit('reloadPage');
    }

    public function borrar($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        $this->reloadPage();
    }

    public function render()
    {
        $cursos = Curso::paginate(15);
        return view('livewire.cursos.administrador', [
            'cursos' => $cursos
        ]);
        $this->refresh();   
    }
}
