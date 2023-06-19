<?php

namespace App\Models\Cursos;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosClase extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $table = "cursos_clases";

    protected $fillable = [
        "titulo",
        'cursos_modulo_id'
    ];

    public function contenidos()
    {
        return $this->hasMany(Contenido::class,"cursos_clase_id","id");
    }
}
