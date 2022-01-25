<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Evento extends Model
{
    use HasFactory;
    use CreatedUpdatedBy;

    public function getFechaInicioAttribute($value)
    {
        return Carbon::parse( $value )->format("Y-m-d");
    }

    public function getFechaFinAttribute($value)
    {
        return Carbon::parse( $value )->format("Y-m-d");
    }

    public function getFechaInicioFormat($format)
    {
        return Carbon::parse( $this->fecha_inicio )->format($format);
    }
}
