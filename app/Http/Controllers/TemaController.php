<?php

namespace App\Http\Controllers;

use App\Models\Cursos\Categoria;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function list(Request $request, $slug)
    {
        $categoria = Categoria::where("slug", $slug)->firstOrFail();

        return view('tema.list', compact('categoria'));
    }
}
