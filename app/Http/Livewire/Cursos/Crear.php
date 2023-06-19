<?php

namespace App\Http\Livewire\Cursos;

use App\Models\CaracteristicaCurso;
use App\Models\Curso;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use App\Models\Cursos\CursoModulo;
use App\Models\Cursos\CursosClase;
use App\Models\User;
use CursosContenido;
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

  public $tipos=[];

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
    $this->obtenerSyllaby();
    $this->maestros = User::where('maestro', true)->get();
    $this->tipos = ContenidoTipo::all();

    // dd($this->caracteristicas);
  }

  public function updated($name, $value)
  {
    if ($name == 'curso.nombre') {
      $this->curso->slug = Str::slug($value);
    }
  }

  function obtenerNombreImagen()
  {
    $nombre = $this->imagenCurso->getClientOriginalName();
    [$nombre, $extension] = explode('.', $nombre);
    $nombre = Str::slug($nombre);
    $nombre = "$nombre.$extension";
    $this->nuevaImagen = true;
    return $nombre;
  }

  function obtenerSyllaby()
  {
    $modulos = $this->curso->modulos()->get();

    foreach ($modulos as $key => $value) {
      $this->modulos[$key] = $value;
      $this->modulos[$key]['clases'] = $value->clases()->get();
      foreach ($this->modulos[$key]['clases'] as $key => $value) {
        # code...
      }
    }
  }

  function agregarCaracteristica()
  {
    array_push($this->caracteristicas, [
      'id' => null,
      'detalle' => '',
      'curso_id' => null
    ]);
  }

  function borrarCaracteristica($key, $id = null)
  {
    // dd($id);
    if (!empty($id)) {
      $caracteristica = CaracteristicaCurso::find($id);
      $caracteristica->delete();
    }
    unset($this->caracteristicas[$key]);
  }

  function agregarModulo()
  {
    array_push($this->modulos, [
      'id' => null,
      'titulo' => '',
      'cursos_id' => null,
      'clases' => []
    ]);
  }

  function borrarModulo()
  {
    array_push($this->modulos, [
      'id' => null,
      'titulo' => '',
      'cursos_id' => null,
      'clases' => []
    ]);
  }

  function agregarClase($key)
  {
    // dd('Prueba');
    $this->modulos[$key]['clases'][] = [
      'id' => null,
      'titulo' => '',
      'cursos_modulo_id' => null,
      'contenidos' => []
    ];
  }

  function agregarContenido($keyModulo, $keyClases)
  {
    // dd('Prueba')
    $this->modulos[$keyModulo]['clases'][$keyClases]['contenidos'][] = [
      'id' => '',
      'titulo' => '',
      'subtitulo' => '',
      'detalle' => '',
      'recurso' => '',
      'slug' => '',
      'cursos_clase_id' => '',
      'cursos_contenido_tipo_id' => '',
      'contenido_download' => '',
      'img_fondo' => ''
    ];
  }

  public function render()
  {
    return view('livewire.cursos.crear');
  }

  function guardar()
  {
    $this->validate($this->rules, [
      'required' => 'El campo es requerido'
    ]);

    $this->curso->imagen = empty($this->curso->imagen) ? $this->obtenerNombreImagen() : $this->curso->imagen;

    $this->curso->save();

    if ($this->nuevaImagen)
      $this->imagenCurso->storeAs("cursos/{$this->curso->id}", "{$this->curso->imagen}");
    foreach ($this->caracteristicas as $key => $value) {
      CaracteristicaCurso::updateOrCreate(
        ['id' => $value['id']],
        [
          'detalle' => $value['detalle'],
          'curso_id' => $this->curso->id
        ]
      );
    }

    foreach ($this->modulos as $key => $value) {
      $modulo =  CursoModulo::updateOrCreate(
        ['id' => $value['id']],
        [
          'titulo' => $value['titulo'],
          'cursos_id' => $this->curso->id
        ]
      );
      foreach ($value['clases'] as $key => $valueClase) {
        $clase = CursosClase::updateOrCreate(
          ['id' => $value['id']],
          [
            'titulo' => $valueClase['titulo'],
            'cursos_modulo_id' => $modulo->id
          ]
        );
        foreach ($valueClase['contenidos'] as $key => $valueContent) {
          // dd($valueContent['cursos_contenido_tipo_id']);
          $clase = Contenido::updateOrCreate(
            ['id' => $value['id']],
            [
              'titulo' => $valueContent['titulo'],
              'subtitulo' => $valueContent['subtitulo'],
              'detalle' => $valueContent['detalle'],
              'recurso' => '',
              'slug' => '',
              'cursos_clase_id' => $clase->id,
              'cursos_contenido_tipo_id' => $valueContent['cursos_contenido_tipo_id'],
              'contenido_download' => '',
              'img_fondo' => ''
            ]
          );
        }
      }
    }

    // redirect()->route('curso.editar', $this->curso->id);
    redirect()->route('curso.administrador');
  }
}
