<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $eventos = Evento::all();
        return view('livewire.eventos.index', compact("eventos"));
    }
}
