@extends('layouts.master')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Panel de Administración</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Panel Gestionar Usuarios -->
        <div class="col">
            <div class="card shadow-lg border-light">
                <img src="https://cdn-icons-png.flaticon.com/512/2985/2985648.png" class="card-img-top" alt="Gestionar Usuarios">
                <div class="card-body">
                    <h5 class="card-title text-primary">Gestionar Usuarios</h5>
                    <p class="card-text">Accede al panel para gestionar usuarios en el sistema.</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary w-100">Gestionar Usuarios</a>
                </div>
            </div>
        </div>

        <!-- Panel Generar Reportes -->
        <div class="col">
            <div class="card shadow-lg border-light">
                <img src="https://cdn-icons-png.flaticon.com/512/1219/1219657.png" class="card-img-top" alt="Generar Reportes">
                <div class="card-body">
                    <h5 class="card-title text-success">Generar Reportes</h5>
                    <p class="card-text">Genera reportes detallados sobre el sistema de citas médicas.</p>
                    <a href="{{ route('admin.generarReportes') }}" class="btn btn-success w-100">Generar Reportes</a>
                </div>
            </div>
        </div>

        <!-- Panel Información del Sistema -->
        <div class="col">
            <div class="card shadow-lg border-light">
                <img src="https://cdn-icons-png.flaticon.com/512/685/685669.png" class="card-img-top" alt="Información del Sistema">
                <div class="card-body">
                    <h5 class="card-title text-warning">Información del Sistema</h5>
                    <p class="card-text">Revisa información general sobre el estado del sistema y su rendimiento.</p>
                    <a href="#" class="btn btn-warning w-100">Ver Información</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel de Notificaciones -->
    <div class="card mt-5 shadow-lg border-light">
        <div class="card-body">
            <h5 class="card-title">Notificaciones Recientes</h5>
            <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-primary">Nuevo usuario registrado</a></li>
                <li><a href="#" class="text-decoration-none text-primary">Cita médica cancelada</a></li>
                <li><a href="#" class="text-decoration-none text-primary">Reporte de actividad generado</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
