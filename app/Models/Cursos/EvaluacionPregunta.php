<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionPregunta extends Model
{
    use HasFactory;

    protected $table = "curso_evaluacion_preguntas";

    protected $fillable = ["titulo"];

    public function evaluacionRespuesta()
    {
        return $this->hasMany(EvaluacionRespuesta::class,"pregunta_id","id");
    }
}
