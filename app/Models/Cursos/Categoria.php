<?php

namespace App\Models\Cursos;

use App\Models\Curso;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $table = "cursos_categorias";

    protected $fillable = [
        "imagen",
        "nombre"
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'cursos_categoria_id', 'id');
    }
}
