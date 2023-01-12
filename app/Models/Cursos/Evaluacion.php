<?php

namespace App\Models\Cursos;

use App\Models\Curso as CursoT;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = "curso_evaluacion";

    protected $fillable = ["titulo", "cantidad_preguntas", "cursos_id"];


    public function evaluacionPregunta()
    {
        return $this->hasMany(EvaluacionPregunta::class,"curso_evaluacion_id","id");
    }

    public function curso()
    {
        return $this->hasOne(CursoT::class,"id","cursos_id");
    }

    public function cursoNombre()
    {
        return CursoT::where('id', $this->cursos_id)->firstOr( function() {return new CursoT;});
    }
}
