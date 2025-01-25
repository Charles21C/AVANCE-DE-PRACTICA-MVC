<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckUserType 
{

public function handle (Request $request, Closure $next, $type)

{
    if (Auth::guard('usuarios')->check()) {
        $userType = Auth::guard('usuarios')->user()->tipoUsuario;

        // Asegurarse de que el tipo de usuario es el correcto
        if ($userType != $type && !in_array($userType, ['admin', 'secretaria'])) {
            return redirect('/admin/dashboard'); // O la ruta por defecto para usuarios no autorizados
        }
    }


return $next ($request);



}
}