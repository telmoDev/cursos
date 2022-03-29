<?php

namespace App\Models\Users;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carritos extends Model
{
    use HasFactory;

    protected $table = "user_carrito";

    public function curso()
    {
        return $this->hasOne(Curso::class,'id','cursos_id');
    }
}
