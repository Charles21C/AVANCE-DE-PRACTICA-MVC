<?php

namespace App\Http\Controllers;


use App\Models\UsuarioDelSistema;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role; 


class AdministracionDelSistemaController extends Controller
{
    // Panel principal del administrador
    public function dashboard()
    {
        return view('admin.dashboard'); // Vista principal
    }

    // Gestión de usuarios
    public function gestionarUsuarios()
    {
        $usuarios = UsuarioDelSistema::all(); // Traer todos los usuarios
        return view('admin.gestionarUsuarios', compact('usuarios'));
    }

    // Crear o editar un usuario
    public function crearUsuario(Request $request)
    {
        $data = $request->validate([
            'nombreUsuario' => 'required|string|max:255',
            'contraseña' => 'required|string|min:8',
            'tipoUsuario' => 'required|string',
        ]);

        // Crear el usuario
        $usuario = UsuarioDelSistema::create([
            'nombreUsuario' => $data['nombreUsuario'],
            'contraseña' => bcrypt($data['contraseña']),
            'tipoUsuario' => $data['tipoUsuario'],
        ]);

        // Asignar roles si usas Spatie
        if ($data['tipoUsuario'] === 'administrador') {
            $role = Role::findByName('admin');
            $usuario->assignRole($role); // Asignar el rol de administrador
        }

        return redirect()->route('admin.gestionarUsuarios')->with('success', 'Usuario creado con éxito.');
    }

    // Generar reportes
    public function generarReportes(Request $request)
    {
        $rangoTiempo = $request->input('rangoTiempo');
        // Lógica para generar reportes basados en el rango de tiempo
        return response()->json(['mensaje' => 'Reporte generado.']);
    }
}
