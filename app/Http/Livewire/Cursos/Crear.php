<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\Secciones;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Crear extends Component
{
    public $curso;
    public $secciones;

    protected $rules = [
        'curso.nombre' => '',
        'curso.slug' => '',
        'curso.descripcion_larga' => '',
        'curso.descripcion_corta' => '',
        'curso.precio' => '',

        'secciones.*.titulo' => '',
        'secciones.*.contenido.*.titulo' => '',
        'secciones.*.contenido.*.detalle' => '',
        ''
    ];

    public function mount()
    {
        $this->curso = new Curso;
        $this->secciones = [];
    }
    public function render()
    {
        return view('livewire.cursos.crear');
    }

    public function updated($name, $value)
    {
        if( $name == 'curso.nombre' ){
            $this->curso->slug = Str::slug( $this->curso->nombre, '-');
        }
    }
    public function agregar_seccion()
    {
        $this->secciones[] = [
            'titulo' => '',
            'contenido' => [],
        ];
    }
    public function agregar_contenido($key)
    {
        $this->secciones["{$key}"]['contenido'][] = [
            'titulo' => '',
            'detalle' => '',
        ];
    }

    public function guardar()
    {
        $this->curso->imagen = 'demo';
        $this->curso->user_id = Auth::user()->id;
        $this->curso->cursos_categoria_id = 1;
        $this->curso->author_id = Auth::user()->id;

        $this->curso->save();

        foreach ($this->secciones as $key => $seccione) {
            $seccion = new Secciones;
            $seccion->titulo = $seccione['titulo'];
            $seccion->cursos_id = $this->curso->id;
            $seccion->save();

            foreach ($seccione['contenido'] as $key => $contenido) {
                $contenido_obj = new Contenido;
                $contenido_obj->titulo = $contenido['titulo'];
                $contenido_obj->detalle = $contenido['detalle'];
                $contenido_obj->cursos_contenido_tipo_id = 1;
                $contenido_obj->cursos_seccione_id = $seccion->id;

                $contenido_obj->slug = Str::slug($contenido['titulo'], '-');
                $contenido_obj->save();

            }
        }

    }
}
