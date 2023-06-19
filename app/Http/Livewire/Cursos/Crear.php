<?php

namespace App\Http\Livewire\Cursos;

use App\Models\CaracteristicaCurso;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str as Str;

class Crear extends Component
{
  use WithFileUploads;

  public $curso;
  public $enlaceCurso;
  public $imagenCurso;
  public $nuevaImagen = false;
  public $caracteristicas = [];
  public $modulos = [];
  public $clases = [];
  public $contenidos = [];
  public $maestros;

  protected $rules = [
    'curso.imagen' => '',
    'curso.nombre' => 'required',
    'curso.slug' => 'required',
    'curso.descripcion_larga' => 'required',
    'curso.descripcion_corta' => 'required',
    'curso.hora' => 'required',
    'curso.precio' => 'required',
    'curso.link_video' => 'required',
    'curso.seccion_titulo' => 'required',
    'curso.seccion_subtitulo' => 'required',
    'curso.seccion_link_video' => 'required',
    'curso.seccion_detalle' => 'required',
    'curso.cursos_categoria_id' => '',
    'caracteristicas.*.detalle' => ''
  ];

  public function mount($id = null)
  {
    $this->curso = Curso::where('id', $id)->firstOr(fn () =>  new Curso());
    $this->enlaceCurso = $this->curso->slug;
    $this->imagenCurso = $this->curso->imagen;
    $this->caracteristicas = $this->curso->caracteristicas()->get()->toArray();
    $this->modulos = $this->curso->modulos()->get()->toArray();
    $this->maestros = User::where('maestro', true)->get();

    // dd($this->caracteristicas);
  }

  public function updated($name, $value) {
    if ($name == 'curso.nombre') {
      $this->curso->slug = Str::slug($value);
    }
  }

  function obtenerNombreImagen() {
    $nombre = $this->imagenCurso->getClientOriginalName();
    [$nombre, $extension ] = explode('.', $nombre);
    $nombre = Str::slug($nombre);
    $nombre = "$nombre.$extension";
    $this->nuevaImagen = true;
    return $nombre;
  }

  function agregarCaracteristica() {
    array_push($this->caracteristicas, [
      'id' => null,
      'detalle' => '',
      'curso_id' => null
    ]);
  }

  function borrarCaracteristica($key, $id=null) {
    // dd($id);
    if (!empty($id)) {
      $caracteristica = CaracteristicaCurso::find($id);
      $caracteristica->delete();
    }
    unset($this->caracteristicas[$key]);
  }

  function agregarModulo() {
    array_push($this->modulos, [
      'titulo' => ''
    ]);
  }

  public function render()
  {
    return view('livewire.cursos.crear');
  }

  function guardar() {
    $this->validate($this->rules,[
      'required' => 'El campo es requerido'
    ]);

    $this->curso->imagen = empty($this->curso->imagen) ? $this->obtenerNombreImagen() : $this->curso->imagen;

    $this->curso->save();

    if($this->nuevaImagen)
      $this->imagenCurso->storeAs("cursos/{$this->curso->id}", "{$this->curso->imagen}");
    foreach ($this->caracteristicas as $key => $value) {
      CaracteristicaCurso:: updateOrCreate(
        ['id' => $value['id']],
        [
          'detalle' => $value['detalle'],
          'curso_id' => $this->curso->id
        ]
        );
    }

    redirect()->route('curso.editar', $this->curso->id);
  }

}
