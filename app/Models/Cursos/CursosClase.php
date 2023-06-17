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
        'cursos_id',
        'cursos_modulo_id'
    ];

    // public function contenido()
    // {
    //     return $this->hasMany(Contenido::class,"cursos_seccione_id","id");
    // }
}
