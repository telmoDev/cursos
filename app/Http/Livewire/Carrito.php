<?php

namespace App\Http\Livewire;

use App\Models\Users\Carritos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Carrito extends Component
{
    public function render()
    {
        if( Auth::check() ){
            return view('livewire.carrito',[
                'carrito' => Carritos::where('user_id', Auth::user()->id)->get(),
            ]);
        }else{
            return view('livewire.carrito',[
                'carrito' => new Collection([]),
            ]);
        }
    }

    public function eleminarCarrito($id)
    {
        $elemento =Carritos::where('id', $id)
                    ->where('user_id', Auth::user()->id)->first();
        $elemento->delete();
    }
}
