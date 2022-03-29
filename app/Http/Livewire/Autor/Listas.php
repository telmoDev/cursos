<?php

namespace App\Http\Livewire\Autor;

use App\Models\Curso;
use App\Models\User;
use Livewire\Component;

class Listas extends Component
{
    public $autorid;
    public $autor;


    public function mount()
    {
        $this->autor = User::findOrFail( $this->autorid );

    }
    public function render()
    {
        return view('livewire.autor.listas',[
            'cursos' => Curso::where('author_id', $this->autorid)->paginate(16 ),
        ]);
    }
}
