<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use Notifiable;
  use TwoFactorAuthenticatable;
  use HasPermissionsTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'id',
    'name',
    'email',
    'password',
    'nombres',
    'apellidos',
    'direccion',
    'identificacion',
    'telefono',
    'tipo_identificacion_id',
    'maestro'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'profile_photo_url',
  ];

  public static function GetPreFactura()
  {
    if (Auth::check()) {
      $data = PreFactura::where('user_id', Auth::user()->id )
      ->where('expiro', false)
      ->where('estado_factura', null)
      ->orWhere('estado_factura', 'ESPERA')
      ->latest()->firstOr(function (){ return new PreFactura(); });

      return $data;
    }
  }
}
