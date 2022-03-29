<?php

namespace App\Models\Users;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisCursos extends Model
{
    use HasFactory;

    protected $table = "user_mis_cursos";

    public function curso()
    {
        return $this->hasOne(Curso::class,'id','curso_id');
    }
}
