<?php

namespace App\Models\Cursos;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $table = "cursos_contenido";

    protected $fillable = ["titulo", "detalle", "recurso", 'slug'];

    public function seccion()
    {
        return $this->hasOne(Secciones::class, 'id', 'cursos_seccione_id');
    }
}
