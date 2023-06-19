<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function list(Request $request, $slug)
    {
        $autor = User::where("slug", $slug)->firstOrFail();

        return view('autor.list', compact('autor'));
    }
}
