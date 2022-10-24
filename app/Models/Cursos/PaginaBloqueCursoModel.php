<?php

namespace App\Models\Cursos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Curso;
use App\Traits\CreatedUpdatedBy;

class PaginaBloqueCursoModel extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $table = 'pagina_bloque_curso_models';
    protected $fillable = [
        'titulo',
        'subtitulo',
        'detalle',
        'resource',
        'cursos_id'
    ];

    public function curso()
    {
        return $this->hasOne(Curso::class, 'id', 'cursos_id');
    }
}
