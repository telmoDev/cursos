<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Cursos\Categoria;
use Livewire\Component;

class Index extends Component
{
  public $categorias;
  public function mount()
  {
    $this->categorias = Categoria::all();
  }
    public function render()
    {
        return view('livewire.categoria.index');
    }
}
