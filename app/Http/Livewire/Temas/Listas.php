<?php

namespace App\Http\Livewire\Temas;

use App\Models\Curso;
use App\Models\Cursos\Categoria;
use Livewire\Component;

class Listas extends Component
{
    public $categoriaid;
    public $tema;

    public function mount()
    {
        $this->tema = Categoria::findOrFail( $this->categoriaid );

    }
    public function render()
    {
        return view('livewire.temas.listas',[
            'cursos' => Curso::where('cursos_categoria_id', $this->categoriaid)->paginate(16 ),
        ]);
    }
}
