<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UsuarioDelSistema;




class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view ('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nombreUsuario', 'contraseña');
        $user = UsuarioDelSistema::where('nombreUsuario', $credentials['nombreUsuario'])->first();
    
        if ($user && Hash::check($credentials['contraseña'], $user->contraseña)) {
            Auth::guard('usuarios')->login($user);
    

            if ($user->tipoUsuario == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->tipoUsuario == 'secretaria') {
                 return redirect()->route('admin.dashboard');
            } elseif ($user->tipoUsuario == 'medico') {
                 return redirect()->route('doctor.dashboard'); 
            } elseif ($user->tipoUsuario == 'paciente') {
                return redirect()->route('patients.dashboard'); 
            }
        }
    
        return back()->withErrors([
            'nombreUsuario' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout();
        return redirect()->route('login');
    }
}