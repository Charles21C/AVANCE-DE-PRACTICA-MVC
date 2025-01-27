<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use App\Models\UsuarioDelSistema;

class AdministracionDelSistema extends UsuarioDelSistema
{

    use HasRoles;

    protected $table = 'usuarios'; 

    // Filtra solo a los administradores
    public static function scopeAdministradores($query)
    {
        return $query->where('tipoUsuario', 'administrador');
    }

    // Relación con roles usando Spatie 
    public function permisos()
    {
        return $this->getRoleNames(); 
    }
}
