
@extends('layouts.masterCh')

@section('content')

<div class="container">
    <h1 class="mb-4">BIENVENIDO AL SIGH</h1>
           </div>
 
    <div class="container py-5">
        <!-- Contenedor para limitar el ancho de los paneles -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Panel Agendar Cita -->
            <div class="col">
                <div class="card shadow-sm border-light">
                    <img src="https://img.freepik.com/vector-premium/marque-cita-ilustracion-icono-agenda_585146-885.jpg" class="card-img-top" alt="Imagen Agendar Cita">
                    <div class="card-body">
                        <h5 class="card-title text-success">Agendar Cita</h5>
                        <p class="card-text">Puedes agendar tu cita médica en la especialidad que necesites.</p>
                        <a href="{{ route('citas.create') }}" class="btn btn-success w-100">Agendar Cita</a>
                    </div>
                </div>
            </div>

            <!-- Panel Consultar Citas -->
            <div class="col">
                <div class="card shadow-sm border-light">
                    <img src="https://static.vecteezy.com/system/resources/previews/005/972/642/non_2x/medical-appointment-time-icon-on-white-vector.jpg" class="card-img-top" alt="Imagen Consultar Citas">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Consultar Citas</h5>
                        <p class="card-text">Revisa todas tus citas médicas programadas.</p>
                        <a href="{{ route('citas.index') }}" class="btn btn-primary w-100">Consultar Citas</a>
                    </div>
                </div>
            </div>

            <!-- Panel Cancelar Citas -->
            <div class="col">
                <div class="card shadow-sm border-light">
                    <img src="https://www.shutterstock.com/image-vector/events-cancelled-concept-vector-illustration-600nw-1674034168.jpg" class="card-img-top" alt="Imagen Cancelar Citas">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Cancelar Cita</h5>
                        <p class="card-text">Si ya no necesitas una cita, puedes cancelarla.</p>
                        <a href="{{ route('citas.index') }}" class="btn btn-danger w-100">Cancelar Cita</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel de Información Adicional -->
        <div class="card mt-5 shadow-sm border-light">
            <div class="card-body">
                <h5 class="card-title">Información Adicional</h5>
                <p class="card-text">Aquí puedes acceder a otros servicios o información relevante para tu salud.</p>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-primary">Ver Historial Médico</a></li>
                    <li><a href="#" class="text-decoration-none text-primary">Actualizar Datos Personales</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
