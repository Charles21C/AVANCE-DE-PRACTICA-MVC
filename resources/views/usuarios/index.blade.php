@extends('layouts.master')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Gestión de Usuarios</h1>

    <!-- Botones superiores -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Botón Crear Nuevo Usuario -->
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-lg d-flex align-items-center gap-2">
            <i class="bi bi-person-plus-fill"></i> Crear Nuevo Usuario
        </a>

        <!-- Botón para redirigir al Login -->
        <a href="{{ route('login') }}" class="btn btn-secondary btn-lg d-flex align-items-center gap-2">
            <i class="bi bi-box-arrow-in-right"></i> Ir al Login
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabla de usuarios -->
    <div class="table-responsive">
        <table class="table table-hover shadow-sm">
            <thead class="bg-dark text-light">
                <tr>
                    <th><i class="bi bi-hash"></i> ID</th>
                    <th><i class="bi bi-person-fill"></i> Nombre de Usuario</th>
                    <th><i class="bi bi-person-badge-fill"></i> Tipo de Usuario</th>
                    <th><i class="bi bi-envelope-fill"></i> Correo</th>
                    <th><i class="bi bi-gear-fill"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombreUsuario }}</td>
                        <td>
                            @if($usuario->tipoUsuario == 'admin')
                                <span class="badge bg-success"><i class="bi bi-shield-lock-fill"></i> Administrador</span>
                            @elseif($usuario->tipoUsuario == 'medico')
                                <span class="badge bg-info text-dark"><i class="bi bi-heart-pulse-fill"></i> Médico</span>
                            @elseif($usuario->tipoUsuario == 'paciente')
                                <span class="badge bg-primary"><i class="bi bi-person-heart"></i> Paciente</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-person-fill"></i> Secretaria</span>
                            @endif
                        </td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                <i class="bi bi-pencil-fill"></i> Editar
                            </a>
                            
                            <!-- Botón Eliminar -->
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center gap-1" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Estilo para la tabla */
    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background-color: #343a40;
        color: #fff;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Estilo para los botones grandes */
    .btn-lg {
        padding: 10px 20px;
        display: inline-flex;
        align-items: center;
    }

    .btn-lg .bi {
        font-size: 1.5rem;
    }

    /* Badges personalizados */
    .badge {
        font-size: 0.9rem;
        padding: 0.4em 0.6em;
        display: inline-flex;
        align-items: center;
        gap: 0.3em;
    }

    /* Iconos para acciones */
    .btn-sm {
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
    }

    .btn-sm .bi {
        font-size: 1.1rem;
    }

    /* Estilo para alertas */
    .alert {
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
</style>

<style>
    
    /* Barra de navegación oculta en la página principal */
    .navbar {
        display: none !important;
    }
</style>
@endpush
