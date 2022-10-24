<?php

namespace App\Models;

use App\Models\Cursos\Cita;
use App\Models\Cursos\Contenido;
use App\Models\Cursos\Evaluacion;
use App\Models\Cursos\PaginaBloqueCursoModel;
use App\Models\Cursos\Secciones;
use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    protected $fillable = [
        'imagen',
        'nombre',
        'descripcion_larga',
        'descripcion_corta',
        'descripcion_referencia',
        'precio',
        'user_id',
        'cursos_categoria_id',
    ];


    public function imagen()
    {
        return "/img/cursos/" . $this->imagen;
    }

    public function autor()
    {
        return $this->hasOne(User::class,"id","author_id");
    }

    // public function getPrecioAttribute( $value )
    // {
    //     return "$ " . $value;
    // }

    public function url()
    {
        return env("APP_URL") . "/" . env("URL_CURSOS") . "/" . $this->slug;
    }

    public function secciones()
    {
        return $this->hasMany(Secciones::class,"cursos_id","id");
    }

    public function evaluacion()
    {
        return $this->hasOne(Evaluacion::class,"cursos_id","id");
    }

    public function citas()
    {
        return $this->hasMany(Cita::class,"cursos_id","id");
    }

    public function BloquesPagina()
    {
        return $this->hasMany(PaginaBloqueCursoModel::class,"cursos_id","id");
    }
}
