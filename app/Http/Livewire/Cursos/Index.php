<?php

namespace App\Http\Livewire\Cursos;

use Livewire\Component;

class Index extends Component
{
    public $curso;

    public function render()
    {
        return view('livewire.cursos.index');
    }
}
