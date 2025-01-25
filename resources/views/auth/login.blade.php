@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- Logo en la cabecera -->
                <div class="card-header text-center">
                    <img src="{{ asset('https://img.freepik.com/vector-premium/vector-logotipo-hospital_1277164-14253.jpg') }}" alt="Logo" class="mb-3" style="width: 120px; height: auto;">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <!-- Formulario de Login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Usuario -->
                        <div class="form-group mb-3">
                            <label for="nombreUsuario">Usuario</label>
                            <input type="text" id="nombreUsuario" name="nombreUsuario" class="form-control @error('nombreUsuario') is-invalid @enderror" value="{{ old('nombreUsuario') }}" required autofocus>
                            @error('nombreUsuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="form-group mb-3">
                            <label for="contraseña">Contraseña</label>
                            <input type="password" id="contraseña" name="contraseña" class="form-control @error('contraseña') is-invalid @enderror" required>
                            
                            @error('contraseña')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Recuerdame -->
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recordarme</label>
                        </div>

                        <!-- Enlace para registro -->
                        <div class="form-group mb-3 text-center">
                            <p>¿No tienes cuenta? <a href="{{ route('usuarios.create') }}">Regístrate aquí</a></p>
                        </div>

                        <!-- Botón de Iniciar sesión -->
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                        </div>
                    </form>

                    <!-- Mostrar errores -->
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Botón de regresar al inicio -->
                    <div class="form-group text-center mt-3">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Regresar al Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Estilos generales */
    body {
        background-color: #f8f9fa; /* Fondo claro */
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
    }

    .card-header {
        background-color:rgb(255, 255, 255);
        color: #0a0a0a;
        border-bottom: none;
        padding: 1.5rem;
    }

    .card-header img {
        display: block;
        margin: 0 auto 10px;
    }

    .btn-primary {
        background-color: #0056b3;
        border: none;
    }

    .btn-primary:hover {
        background-color: #00408a;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Ocultar la barra de navegación */
    .navbar {
        display: none !important;
    }
</style>
@endpush
