<?php

namespace App\Http\Livewire\Carrito\Agregar;

use App\Models\Users\Carritos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Modal extends Component
{
    public $curso;
    public $elemento_carrito;
    public $agregar_carrito;


    public function render()
    {
        return view('livewire.carrito.agregar.modal');
    }

    public function add()
    {
        if( ! Auth::check() ){ return redirect()->route('login'); }

        $carrito = new Carritos;
        $carrito->user_id = Auth::user()->id;
        $carrito->cursos_id = $this->curso->id;
        $carrito->save();

        $this->agregar_carrito = true;
    }
}
