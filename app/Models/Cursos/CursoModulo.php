<?php

namespace App\Models\Cursos;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoModulo extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $table = "cursos_modulos";

    protected $fillable = [
        "titulo",
        'cursos_id',
        'clases'
    ];

    public function clases()
    {
        return $this->hasMany(CursosClase::class,"cursos_modulo_id","id");
    }
}

