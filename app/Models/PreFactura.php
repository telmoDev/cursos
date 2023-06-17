<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreFactura extends Model
{
    use HasFactory;

    protected $fillable = [
      'sa_fac_num',
      'expiro',
      'url_pago',
      'estado_factura',
      'fecha_creado',
      'anulado',
      'user_id'
    ];
}
