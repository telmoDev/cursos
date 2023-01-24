<?php

namespace App\Http\Livewire\Categoria;

use App\Models\Cursos\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  use WithPagination;
  public function borrar($id)
    {
        $categiria = Categoria::find($id);
        $categiria->delete();
    }
    public function render()
    {
        return view('livewire.categoria.index',[
          'categorias' => Categoria::paginate(15)
        ]);
    }
}
