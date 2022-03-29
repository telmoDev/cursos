<?php

namespace App\Http\Livewire\User;

use App\Models\Users\MisCursos as UsersMisCursos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Miscursos extends Component
{
    public $mis_cursos;

    public function mount()
    {
        $id_user = Auth::user()->id;
        $this->mis_cursos = UsersMisCursos::where('user_id', $id_user)->get();
    }
    public function render()
    {
        return view('livewire.user.miscursos');
    }
}
