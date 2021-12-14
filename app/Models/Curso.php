<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'nombre',
        'descripcion_larga',
        'descripcion_corta',
        'precio',
        'user_id',
        'cursos_categoria_id',
    ];


    public function autor()
    {
        return $this->hasOne(User::class,"id","author_id");
    }

    public function getPrecioAttribute( $value )
    {
        return "$ " . $value;
    }

    public function url()
    {
        return env("APP_URL") . "/" . env("URL_CURSOS") . "/" . $this->slug;
    }
}
