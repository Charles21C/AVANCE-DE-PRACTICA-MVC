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

        if ($userType != $type && !in_array($userType, ['admin', 'secretaria'])) {
            return redirect('/admin/dashboard');  }
           // elseif ($userType != $type && !in_array($userType, ['paciente'])) {
           //    return redirect('/patients/dashboard'); 
       // }
   


return $next ($request);



}

} }

