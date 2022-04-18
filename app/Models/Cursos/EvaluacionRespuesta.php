<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionRespuesta extends Model
{
    use HasFactory;

    protected $table = "curso_evaluacion_pregunta_respuestas";

    protected $fillable = ["titulo"];
}
