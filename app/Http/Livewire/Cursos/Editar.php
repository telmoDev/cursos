<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\Cita;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\ContenidoTipo;
use App\Models\Cursos\PaginaBloqueCursoModel;
use App\Models\Cursos\Secciones;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Editar extends Component
{
  use WithFileUploads;

  public $curso;
  public $secciones;
  public $contenidoTipos;
  public $citas;
  public $bloques;

  public $enlace;

  public $imgCurso;
  public $hasImgCurso;

  public $contentToDownload;

  protected $rules = [
    'curso.nombre' => 'required',
    'curso.slug' => 'required',
    'curso.descripcion_larga' => 'required',
    'curso.descripcion_corta' => 'required',
    'curso.descripcion_referencia' => '',
    'curso.precio' => 'required',

    'secciones.*.titulo' => 'required',
    'secciones.*.contenido.*.titulo' => 'required',
    'secciones.*.contenido.*.detalle' => 'required',
    'secciones.*.contenido.*.subtitulo' => 'required',
    'secciones.*.contenido.*.cursos_contenido_tipo_id' => 'required',
  ];

  public function mount($id)
  {
    $this->contenidoTipos = ContenidoTipo::all(['id', 'titulo']);
    $this->curso = Curso::find($id);
    $this->secciones = [];
    $this->citas = [];
    $this->bloques = [];
    $this->enlace = env('APP_URL') . '/' . env('URL_CURSOS') . '/' . $this->curso->slug . '/';
    $this->imgCurso = $this->curso->imagen;
    $this->hasImgCurso = $this->curso->imagen;
    $this->getSecciones();
    $this->getCitas();
    $this->getBloquePagina();
  }

  public function updated($name, $value)
  {
    if ($name == 'curso.nombre') {
      $this->curso->slug = Str::slug($this->curso->nombre, '-');
    }
    if ($name == 'secciones.0.contenido.0.has_download') {
      dd($value);
    }
  }

  public function getSecciones()
  {
    $secciones = Secciones::where('cursos_id', $this->curso->id)->get();
    $this->secciones = [...$secciones];
  }

  public function getCitas()
  {
    $citas = Cita::where('cursos_id', $this->curso->id)->get();
    $this->citas = [...$citas];
  }

  public function getBloquePagina()
  {
    $bloques = PaginaBloqueCursoModel::where('cursos_id', $this->curso->id)->get();
    if (count($this->bloques)) {
      $this->bloques = [...$bloques];
    } else {
      $this->bloques = [
        [
          'id' => null,
          'titulo' => '',
          'subtitulo' => '',
          'detalle' => '',
        ],
        [
          'id' => null,
          'titulo' => '',
          'subtitulo' => '',
          'detalle' => '',
        ],
      ];
    }
  }

  public function agregar_seccion()
  {
    $this->secciones[] = [
      'id' => null,
      'titulo' => '',
      'contenido' => [],
    ];
  }
  public function agregar_cita()
  {
    $this->citas[] = [
      'id' => null,
      'autor' => '',
      'profesion' => '',
      'imagen' => '',
      'detalle' => ''
    ];
  }

  public function agregar_contenido($key)
  {
    $this->secciones["{$key}"]['contenido'][] = [
      'id' => null,
      'titulo' => '',
      'subtitulo' => '',
      'detalle' => '',
      'cursos_contenido_tipo_id' => '',
      'contenido_download' => '',
    ];
  }



  public function borrarSeccion($seccionKey)
  {
    $seccion = Secciones::find($seccionKey);
    $seccion->delete();
    $this->secciones = [];
    $this->getSecciones();
  }

  public function borrarContenido($contenidoKey)
  {
    $contenido = Contenido::find($contenidoKey);
    $contenido->delete();
    $this->secciones = [];
    $this->getSecciones();
  }

  public function borrarCita($id)
  {
    $cita = Cita::find($id);
    $cita->delete();
    $this->citas = [];
    $this->getCitas();
  }

  public function borrarContenidoDownload($seccionKey, $contenidoKey)
  {
    $content_id = $this->secciones[$seccionKey]['contenido'][$contenidoKey]['id'];
    $content_file = $this->secciones[$seccionKey]['contenido'][$contenidoKey]['contenido_download'];
    $path = "cursos/{$this->curso->id}/download/{$content_id}/{$content_file}";
    if (Storage::exists($path)) {
      Storage::delete($path);
      $this->secciones[$seccionKey]['contenido'][$contenidoKey]['contenido_download'] = null;
    } else {
      $this->secciones[$seccionKey]['contenido'][$contenidoKey]['contenido_download'] = null;
    }

  }

  public function borrarImagen()
  {
    if ($this->hasImgCurso) {
      Storage::delete("cursos/{$this->curso->slug}/{$this->curso->imagen}");
      $this->curso->imagen = null;
      $this->curso->update();
      $this->imgCurso = null;
      $this->hasImgCurso = null;
    }else{
      $this->imgCurso = null;
    }
  }

  public function guardar()
  {
    $this->validate($this->rules, [
      'required' => "El campo es requerido."
    ]);


    if( empty($this->hasImgCurso) ) {
      $this->imgCurso->storeAs("cursos/{$this->curso->id}", "{$this->curso->slug}.{$this->imgCurso->getClientOriginalExtension()}");

      $this->curso->imagen = "{$this->curso->slug}.{$this->imgCurso->getClientOriginalExtension()}";
    }

    $this->curso->save();

    foreach ($this->citas as $value) {
      Cita::updateOrCreate(
        ['id' => $value['id']],
        [
          'autor' => $value['autor'],
          'profesion' => $value['profesion'],
          'imagen' => $value['imagen'],
          'detalle' => $value['detalle'],
          'cursos_id' => $this->curso->id
        ]
      );
    }

    foreach ($this->bloques as $key => $value) {
      PaginaBloqueCursoModel::updateOrCreate(
        ['id' => $value['id']],
        [
          'titulo' => $value['titulo'],
          'subtitulo' => $value['subtitulo'],
          'detalle' => $value['detalle'],
          'cursos_id' => $this->curso->id
        ]
      );
    }

    foreach ($this->secciones as $key => $value) {
      $seccion = Secciones::updateOrCreate(
        ['id' => $value['id']],
        [
          'titulo' => $value['titulo'],
          'cursos_id' => $this->curso->id
        ]
      );
      foreach ($value['contenido'] as $key => $valuec) {

        $name_file = null;
        $file = $valuec['contenido_download'];
        if ($valuec['contenido_download']) {
          $name_slug = Str::slug($file->getClientOriginalName(),'_');
          $name_file = $name_slug.'.'.$file->getClientOriginalExtension();
        }

        $contenido = Contenido::updateOrCreate(
          ['id' => $valuec['id']],
          [
            'titulo' => $valuec['titulo'],
            'subtitulo' => $valuec['subtitulo'],
            'detalle' => $valuec['detalle'],
            'slug' => Str::slug($valuec['titulo'], "-"),
            "cursos_contenido_tipo_id" => $valuec['cursos_contenido_tipo_id'],
            'cursos_seccione_id' => $seccion->id,
            'contenido_download' => $name_file
          ]
        );
        if ($valuec['contenido_download']) {
          $file->storeAs("cursos/{$this->curso->id}/download/{$contenido->id}", $name_file);
        }
      }
    }


    redirect()->route('curso.editar', $this->curso->id);
  }

  public function render()
  {
    return view('livewire.cursos.editar');
  }
}
