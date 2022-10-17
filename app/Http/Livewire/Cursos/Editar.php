<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Secciones;
use App\Models\CursosSeccionesTipo;
use Livewire\Component;

class Editar extends Component
{

    public $curso;
    public $secciones;
    public $seccionesTipos;

    public $enlace;

    protected $rules = [
        'curso.nombre' => 'required',
        'curso.slug' => 'required',
        'curso.descripcion_larga' => 'required',
        'curso.descripcion_corta' => 'required',
        'curso.precio' => 'required',

        'secciones.*.titulo' => 'required',
        'secciones.*.tipo_id' => 'required',
        'secciones.*.contenido.*.titulo' => 'required',
        'secciones.*.contenido.*.detalle' => 'required',
    ];

    public function mount($id)
    {
        $this->curso = Curso::find($id);
        $this->secciones = [];
        $secciones = Secciones::where('cursos_id', $id)->get();
        $this->secciones = [...$secciones];
        $this->seccionesTipos = CursosSeccionesTipo::all(['id', 'nombre']);
        $this->enlace = env('APP_URL').'/'.env('URL_CURSOS').'/'.$this->curso->slug.'/';
    }

    public function agregar_seccion()
    {
        $this->secciones[] = [
            'titulo' => '',
            'tipo_id' => '',
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
            'required' => "El campo es requerido."
        ]);

        $this->curso->descripcion_corta = $this->curso->descripcion_corta;
        $this->curso->save();
    }

    public function render()
    {
        return view('livewire.cursos.editar');
    }
}
