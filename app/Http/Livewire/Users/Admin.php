<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Admin extends Component
{
  use WithPagination;
  public function borrar($id)
    {
        $user = User::find($id);
        $user->delete();
    }
    public function render()
    {
        return view('livewire.users.admin', [
            'users' => User::paginate(10),
        ]);
    }

}
