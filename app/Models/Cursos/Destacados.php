<?php

namespace App\Models\Cursos;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destacados extends Model
{
    use HasFactory;

    protected $table = "cursos_destacados";

    public function curso()
    {
        return $this->hasOne(Curso::class,"id","cursos_id");
    }
}
