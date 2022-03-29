<?php

namespace App\Http\Livewire\Carrito;

use App\Models\Users\Carritos;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.carrito.menu',[
            'num_prod' => Carritos::count(),
        ]);
    }
}
