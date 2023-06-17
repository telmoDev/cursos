<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso as CursoT;

class EvaluacionPregunta extends Model
{
    use HasFactory;

    protected $table = "curso_evaluacion_preguntas";

    protected $fillable = ["titulo", 'curso_id', 'curso_seccion_id'];

    public function evaluacionRespuesta()
    {
        return $this->hasMany(EvaluacionRespuesta::class,"pregunta_id","id");
    }
    public function curso()
    {
        return $this->hasOne(CursoT::class,"id","curso_id");
    }

    public function seccion()
    {
        return $this->hasOne(Secciones::class,"id","curso_seccion_id");
    }
}
