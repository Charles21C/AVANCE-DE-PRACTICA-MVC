<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use App\Models\UsuarioDelSistema;

class AdministracionDelSistema extends UsuarioDelSistema
{
    // Usar el trait HasRoles para gestión de roles y permisos
    use HasRoles;

    protected $table = 'usuarios'; // Tabla compartida con UsuarioDelSistema

    // Filtra solo a los administradores
    public static function scopeAdministradores($query)
    {
        return $query->where('tipoUsuario', 'administrador');
    }

    // Relación con roles usando Spatie (si lo usas)
    public function permisos()
    {
        return $this->getRoleNames(); // Suponiendo que usas Spatie Laravel Permission
    }
}
