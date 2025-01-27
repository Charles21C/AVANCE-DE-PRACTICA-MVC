@extends('layouts.masterCh')

@section('title', 'Crear Usuario')

@section('content')
<div class="container mt-5">
    <!-- Mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card para el formulario de Crear Usuario -->
    <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
            <h2 class="mb-0">Crear Nuevo Usuario</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-center mb-4">

                <img src="https://cdn-icons-png.flaticon.com/512/6210/6210134.png" alt="Icono Usuario" class="img-fluid rounded-circle" style="max-width: 150px;">
            </div>

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombreUsuario" class="form-label"><strong>Nombre de Usuario</strong></label>
                    <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control form-control-lg" value="{{ old('nombreUsuario') }}" required>
                    @error('nombreUsuario')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="contraseña" class="form-label"><strong>Contraseña</strong></label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control form-control-lg" required>
                    @error('contraseña')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tipoUsuario" class="form-label"><strong>Tipo de Usuario</strong></label>
                    <select name="tipoUsuario" id="tipoUsuario" class="form-select form-select-lg" required>
                        <option value="admin">Administrador</option>
                        <option value="medico">Médico</option>
                        <option value="paciente">Paciente</option>
                        <option value="secretaria">Secretaria</option>
                    </select>
                    @error('tipoUsuario')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label"><strong>Correo</strong></label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Botón para guardar el usuario -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg shadow-lg">
                        <i class="bi bi-save"></i> Guardar Usuario
                    </button>
                </div>
                
                <div class="card-footer text-end" style="background-color: #f1f1f1;">
            <a href="{{ route('login') }}" class="btn btn-secondary">Volver</a>
        </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')

<style>
    
    /* Barra de navegación oculta en la página principal */
    .navbar {
        display: none !important;
    }
</style>
@endpush
