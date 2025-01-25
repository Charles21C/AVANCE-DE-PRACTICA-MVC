@extends('layouts.master')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombreUsuario" class="form-label">Nombre de Usuario</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" value="{{ $usuario->nombreUsuario }}" required>
        </div>

        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña (dejar en blanco para no cambiar)</label>
            <input type="contraseña" name="contraseña" id="contraseña" class="form-control">
        </div>

        <div class="mb-3">
            <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
            <select name="tipoUsuario" id="tipoUsuario" class="form-select" required>
                <option value="admin" {{ $usuario->tipoUsuario == 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="medico" {{ $usuario->tipoUsuario == 'medico' ? 'selected' : '' }}>Médico</option>
                <option value="paciente" {{ $usuario->tipoUsuario == 'paciente' ? 'selected' : '' }}>Paciente</option>
            </select>
        </div>


        <div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuarioDelSistema->email) }}" required>
</div>


        <button type="submit" class="btn btn-warning">Actualizar Usuario</button>
    </form>
</div>
@endsection
