@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Gestión de Usuarios</h1>

        <a href="{{ route('admin.crearUsuario') }}" class="btn btn-success mb-3">Crear Nuevo Usuario</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre de Usuario</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombreUsuario }}</td>
                        <td>{{ $usuario->tipoUsuario }}</td>
                        <td>
                            <a href="{{ route('admin.editarUsuario', $usuario->id) }}" class="btn btn-warning">Editar</a>
                            
                            <form action="{{ route('admin.eliminarUsuario', $usuario->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $usuarios->links() }}
    </div>
@endsection
