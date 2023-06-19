<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaCurso extends Model
{
    use HasFactory;

    protected $fillable = [
      'detalle',
      'curso_id'
    ];
}
