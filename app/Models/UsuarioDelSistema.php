<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsuarioDelSistema extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table= 'usuarios';

    protected $fillable =[
        'nombreUsuario',
        'contraseña',
        'tipoUsuario',
        'email',

    ];

    protected $hidden =[
        'contraseña',

    ];

    public function getAuthPassword ()
    {
        return $this->contraseña;

    }

    public $timestamps = false;

      // Relación con el usuario
      public function patient()
      {
          return $this->hasOne(Patients::class, 'usuario_id');
      }
}
