<?php

namespace App\Models\Cursos;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
  use HasFactory;
  use CreatedUpdatedBy;

  protected $table = "cursos_contenidos";

  protected $fillable = [
    "titulo",
    "subtitulo",
    "detalle",
    "recurso",
    'slug',
    'cursos_id',
    'cursos_modulo_id',
    'cursos_clase_id',
    'cursos_contenido_tipo_id',
    'contenido_download',
    'img_fondo'
  ];

  // public function seccion()
  // {
  //   return $this->hasOne(Secciones::class, 'id', 'cursos_seccione_id');
  // }
}
