<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug)
    {
        $curso = Curso::where("slug", $slug)->firstOrFail();
        return view("cursos.index", compact('curso'));
    }

    public function alumno(Request $request, $curso, $seccion)
    {
        return view("cursos.alumno", compact('curso', 'seccion'));
    }

    public function list()
    {
        return view("cursos.list");
    }

    public function crear()
    {
        return view("cursos.crear");
    }
}
