<?php

namespace App\Models\Cursos;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
  use HasFactory;
  use CreatedUpdatedBy;

  protected $table = "cursos_contenido";

  protected $fillable = ["titulo", "subtitulo", "detalle", "recurso", 'slug', 'cursos_seccione_id', 'cursos_contenido_tipo_id', 'contenido_download', 'img_fondo'];

  public function seccion()
  {
    return $this->hasOne(Secciones::class, 'id', 'cursos_seccione_id');
  }
}
