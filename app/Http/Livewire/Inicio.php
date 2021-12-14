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
        $this->cursos_detacados = Destacados::take(5)->get();
        $this->categorias = Categoria::take(8)->get();
        $this->cursos = Curso::take(20)->get();
        $this->autores = User::take(8)->get();
    }
    public function render()
    {
        return view('livewire.inicio');
    }
}
