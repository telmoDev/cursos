<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosSeccionesTipo extends Model
{
    use HasFactory;
    protected $table = 'cursos_secciones_tipos';

    protected $fillable = [
        'nombre'
    ];
}
