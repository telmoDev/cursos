<?php

namespace App\Http\Livewire;

use App\Models\Users\Carritos;
use App\Models\Users\MisCursos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Carrito extends Component
{
    public $idCursos;
    public function updated($name, $value)
    {
      if ($name == 'idCursos') {
        $this->agrearAlUsuario();
      }
    }
    public function agrearAlUsuario()
    {
      $insertar = [];
      foreach ($this->idCursos as $key => $value) {
        array_push($insertar, [
          'curso_id' => intval($value),
          'user_id' => Auth::id()
        ]);
      }
      MisCursos::insert($insertar);
    }
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
