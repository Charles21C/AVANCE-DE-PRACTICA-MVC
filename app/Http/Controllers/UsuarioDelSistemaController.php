<?php

namespace App\Http\Controllers;

use App\Models\UsuarioDelSistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioDelSistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = UsuarioDelSistema::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombreUsuario' => 'required|string|max:255|unique:usuarios,nombreUsuario',
            'contraseña' => 'required|string|min:6',
            'tipoUsuario' => 'required|string|in:admin,medico,paciente,secretaria',
            'email' => 'required|string|max:255',
        ]);

        // Crear el usuario
        UsuarioDelSistema::create([
            'nombreUsuario' => $request->nombreUsuario,
            'contraseña' => Hash::make($request->contraseña), // Encriptar la contraseña
            'tipoUsuario' => $request->tipoUsuario,
            'email' => $request->email,
        ]);

        

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UsuarioDelSistema $usuarioDelSistema)
    {
        return view('usuarios.show', compact('usuarioDelSistema'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsuarioDelSistema $usuarioDelSistema)
    {
        return view('usuarios.edit', compact('usuarioDelSistema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsuarioDelSistema $usuarioDelSistema)
    {
        $request->validate([
            'nombreUsuario' => 'required|string|max:255|unique:usuarios,nombreUsuario,' . $usuarioDelSistema->id,
            'contraseña' => 'nullable|string|min:6',
            'tipoUsuario' => 'required|string|in:admin,medico,paciente,secretaria',
            'email' => 'required|string|max:255',
        ]);

        // Actualizar los datos del usuario
        $usuarioDelSistema->update([
            'nombreUsuario' => $request->nombreUsuario,
            'contraseña' => $request->contraseña ? Hash::make($request->contraseña) : $usuarioDelSistema->contraseña,
            'tipoUsuario' => $request->tipoUsuario,
            'email' => $request->email,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsuarioDelSistema $usuarioDelSistema)
    {
        $usuarioDelSistema->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
