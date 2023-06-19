<?php

namespace App\Models;

use App\Models\Cursos\CursoModulo;
use App\Models\Cursos\Evaluacion;

use App\Traits\CreatedUpdatedBy;
// use CursoEvaluacionPreguntas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Curso extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = [
      'id',
      'imagen',
      'nombre',
      'slug',
      'descripcion_larga',
      'descripcion_corta',
      'hora',
      'precio',
      'link_video',
      'seccion_titulo',
      'seccion_subtitulo',
      'seccion_link_video',
      'seccion_detalle',
      'cursos_categoria_id'
    ];


    public function getImagen()
    {
      if ($this->imagen) {
        return route('img.bg.curso', ['folder' => $this->id, 'filename' => $this->imagen]);
      }
      return '';
    }

    public function autor()
    {
        return $this->hasOne(User::class,"id","author_id");
    }

    // public function getPrecioAttribute( $value )
    // {
    //     return "$ " . $value;
    // }

    public function url()
    {
        return env("APP_URL") . "/" . env("URL_CURSOS") . "/" . $this->slug;
    }

    public function modulos()
    {
        return $this->hasMany(CursoModulo::class,"cursos_id","id");
    }

    public function evaluacion()
    {
        return $this->hasOne(Evaluacion::class,"cursos_id","id");
    }


    function caracteristicas() {
      return $this->hasMany(CaracteristicaCurso::class, "curso_id", "id");
    }


}
