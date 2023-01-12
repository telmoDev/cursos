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

    public function evaluacion(Request $request, $curso)
    {
        return view("cursos.evaluacion", compact('curso'));
    }

    public function evaluacionAdmin(Request $request)
    {
        return view("cursos.evaluacion-admin");
    }

    public function evaluacionCrearEditar(Request $request, $id = null)
    {
        return view("cursos.evaluacion-crear-editar", compact('id'));
    }

    public function list()
    {
        return view("cursos.list");
    }

    public function crear()
    {
        return view("cursos.crear");
    }

    public function editar(Request $request, $id)
    {
        return view("cursos.editar", compact('id'));
    }

    public function administrador()
    {
        return view("cursos.administrador");
    }

}
