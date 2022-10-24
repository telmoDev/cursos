<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Cita;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use App\Models\Cursos\PaginaBloqueCursoModel;
use App\Models\Cursos\Secciones;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Crear extends Component
{
    public $curso;
    public $secciones;
    public $contenidoTipos;
    public $citas;
    public $bloques;

    protected $rules = [
        'curso.nombre' => 'required',
        'curso.slug' => 'required',
        'curso.descripcion_larga' => 'required',
        'curso.descripcion_corta' => 'required',
        'curso.descripcion_referencia' => '',
        'curso.precio' => 'required',

        'secciones.*.titulo' => 'required',
        'secciones.*.contenido.*.titulo' => 'required',
        'secciones.*.contenido.*.subtitulo' => 'required',
        'secciones.*.contenido.*.detalle' => 'required',
        'secciones.*.contenido.*.cursos_contenido_tipo_id' => 'required',
    ];

    public function mount()
    {
        $this->curso = new Curso;
        $this->contenidoTipos = ContenidoTipo::all(['id', 'titulo']);
        $this->secciones = [];
        $this->citas = [];
        $this->bloques = [
            [
                'titulo' => '',
                'subtitulo' => '',
                'detalle' => ''
            ],
            [
                'titulo' => '',
                'subtitulo' => '',
                'detalle' => ''
            ]
        ];
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
            'subtitulo' => '',
            'detalle' => '',
            'cursos_contenido_tipo_id' => '',
        ];
    }

    public function agregar_cita()
    {
        $this->citas[] = [
            'autor' => '',
            'profesion' => '',
            'imagen' => '',
            'detalle' => ''
        ];
    }

    public function borrarCita($key)
    {
       unset($this->citas[$key]);
       $this->citas = array_values($this->citas);
    }

    public function borrarSeccion($seccionKey)
    {
        unset($this->secciones[$seccionKey]);
        $this->secciones = array_values($this->secciones);
    }

    public function borrarContenido($seccionKey, $contenidoKey)
    {
        unset($this->secciones[$seccionKey]['contenido'][$contenidoKey]);
        $this->secciones = array_values($this->secciones);
    }

    public function guardar()
    {
        $this->validate($this->rules, [
            'required' => 'El campo es requerido'
        ]);
        $this->curso->imagen = 'demo';
        $this->curso->user_id = Auth::user()->id;
        $this->curso->cursos_categoria_id = 1;
        $this->curso->author_id = Auth::user()->id;

        $this->curso->save();

        foreach ($this->citas as $key => $value) {
            $this->citas[$key]['profesion'] = strtoupper($this->citas[$key]['profesion']);
            $this->citas[$key]['cursos_id'] = $this->curso->id;
        }
        if (count($this->citas)) {
            Cita::insert(...$this->citas);
        }

        foreach ($this->bloques as $key => $value) {
            $this->bloques[$key]['cursos_id'] = $this->curso->id;
        }
        if (count($this->bloques)) {
            PaginaBloqueCursoModel::insert($this->bloques);
        }

        foreach ($this->secciones as $key => $seccione) {
            $seccion = new Secciones;
            $seccion->titulo = $seccione['titulo'];
            $seccion->cursos_id = $this->curso->id;
            $seccion->save();

            foreach ($seccione['contenido'] as $key => $contenido) {
                $contenido_obj = new Contenido;
                $contenido_obj->titulo = $contenido['titulo'];
                $contenido_obj->subtitulo = $contenido['subtitulo'];
                $contenido_obj->detalle = $contenido['detalle'];
                $contenido_obj->cursos_contenido_tipo_id = $contenido['cursos_contenido_tipo_id'];
                $contenido_obj->cursos_seccione_id = $seccion->id;

                $contenido_obj->slug = Str::slug($contenido['titulo'], '-');
                $contenido_obj->save();

            }
        }

        $this->reset([
            'curso',
            'secciones',
        ]);

        redirect()->route('curso.administrador');
    }
}
