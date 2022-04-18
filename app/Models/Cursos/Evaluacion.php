<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = "curso_evaluacion";

    protected $fillable = ["titulo"];


    public function evaluacionPregunta()
    {
        return $this->hasMany(EvaluacionPregunta::class,"curso_evaluacion_id","id");
    }

}
