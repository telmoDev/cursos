<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprobados extends Model
{
    use HasFactory;

    protected $table = "curso_aprobado";

    protected $fillable = [
        'curso_id',
        'user_id',
        'cursos_seccione_id',
    ];
}
