<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use App\Models\Cursos\Categoria;
use App\Models\Cursos\Destacados;
use App\Models\User;
use Livewire\Component;

class Inicio extends Component
{
    public $cursos_detacados;
    public $categorias;
    public $cursos;

    public function mount()
    {
        $this->cursos = Curso::take(3)->get();
    }
    public function render()
    {
        return view('livewire.inicio');
    }
}
