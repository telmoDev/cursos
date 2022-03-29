<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Contenido;
use Livewire\Component;

class Alumno extends Component
{
    public $curso_slug;
    public $seccion;

    public $curso;
    public $mostrar_curso;

    public $contenido;

    public function mount()
    {
        $this->curso = Curso::where("slug", $this->curso_slug)->first();
        $this->mostrar_curso = Contenido::where("slug", $this->seccion)->first();
        $this->seccion = $this->mostrar_curso->seccion->id;
    }

    public function render()
    {
        return view('livewire.cursos.alumno');
    }

    public function activar_curso($contenido_id, $contenido_slug)
    {
        return redirect()->route('curso.seccion' , [$this->curso_slug, $contenido_slug ] );
    }

}
