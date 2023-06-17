<?php

namespace App\Http\Livewire\Carrito;

use App\Models\Users\Carritos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
      $userId = Auth::user() ? Auth::user()->id : null;
        return view('livewire.carrito.menu',[
            'num_prod' => Carritos::where('user_id', $userId)->count(),
        ]);
    }
}
