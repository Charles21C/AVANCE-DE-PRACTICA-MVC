@extends('layouts.master')

@section('title', 'Crear Usuario')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" value="{{ old('nombreUsuario') }}" required>
        </div>

        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="contraseña" name="contraseña" id="contraseña" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
            <select name="tipoUsuario" id="tipoUsuario" class="form-select" required>
                <option value="admin">Administrador</option>
                <option value="medico">Médico</option>
                <option value="paciente">Paciente</option>
                <option value="secretaria">Secretaria</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Usuario</button>
    </form>
</div>
@endsection
