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

    public $modalIntro = true;

    public function mount()
    {
        $this->curso = Curso::where("slug", $this->curso_slug)->first();
        $this->mostrar_curso = Contenido::where("slug", $this->seccion)->first();
        $this->seccion = $this->mostrar_curso->seccion->id;
        $seccionContenido = Contenido::where("cursos_seccione_id", $this->seccion)->get();
        $contenido_1 = $seccionContenido->filter(function( $item ){
          if ($item->cursos_contenido_tipo_id == 1) {
            return $item;
          }
        });

        $contenido_2 = $seccionContenido->filter(function( $item ){
          if ($item->cursos_contenido_tipo_id == 2) {
            return $item;
          }
        });

        $contenido_3 = $seccionContenido->filter(function( $item ){
          if ($item->cursos_contenido_tipo_id == 3) {
            return $item;
          }
        });

        $this->contenido = [...$contenido_1, ...$contenido_2, ...$contenido_3];
        // dd(count($this->contenido));
    }

    public function render()
    {
        return view('livewire.cursos.alumno');
    }

    public function activar_curso($contenido_id, $contenido_slug)
    {
        return redirect()->route('curso.seccion' , [$this->curso_slug, $contenido_slug ] );
    }

    public function modalIntroOff()
    {
        $this->modalIntro = false;
    }
}
