@extends('layouts.masterCh')

@section('content')

<div class="container">
    <h1 class="mb-4">Bienvenido Doctor</h1>
</div>

<div class="container py-5">
    <!-- Contenedor para limitar el ancho de los paneles -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Panel Gestionar Disponibilidad -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <img src="https://static.vecteezy.com/system/resources/previews/002/566/016/non_2x/medical-appointment-icon-vector.jpg" class="card-img-top" alt="Imagen Gestionar Disponibilidad">
                <div class="card-body">
                    <h5 class="card-title text-success">Gestionar Disponibilidad</h5>
                    <p class="card-text">Configura tus horarios de atención para permitir que los pacientes agenden citas.</p>
                    <a href="{{ route('doctor.create') }}" class="btn btn-success w-100">Gestionar Disponibilidad</a>
                </div>
            </div>
        </div>

        <!-- Panel Consultar Citas -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <img src="https://static.vecteezy.com/system/resources/previews/005/972/642/non_2x/medical-appointment-time-icon-on-white-vector.jpg" class="card-img-top" alt="Imagen Consultar Citas">
                <div class="card-body">
                    <h5 class="card-title text-primary">Consultar Citas</h5>
                    <p class="card-text">Revisa las citas médicas programadas con tus pacientes.</p>
                    <a href="{{ route('cita.index') }}" class="btn btn-primary w-100">Consultar Citas</a>
                </div>
            </div>
        </div>

        <!-- Panel Historial Médico -->
        <div class="col">
            <div class="card shadow-sm border-light">
                <img src="https://media.istockphoto.com/id/1165333893/es/vector/documento-m%C3%A9dico.jpg?s=612x612&w=0&k=20&c=-kef14WE1CG0760Vn2NlYGjs4cIeKWutQ6yeQE9RRX0=" class="card-img-top" alt="Imagen Historial Médico">
                <div class="card-body">
                    <h5 class="card-title text-warning">Historial Médico</h5>
                    <p class="card-text">Accede a los historiales médicos de tus pacientes para un mejor diagnóstico.</p>
                    <a class="btn btn-warning w-100">Ver Historial Médico</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel de Información Adicional -->
    <div class="card mt-5 shadow-sm border-light">
        <div class="card-body">
            <h5 class="card-title">Información Adicional</h5>
            <p class="card-text">Accede a otros recursos y herramientas para tu trabajo médico.</p>
            <ul class="list-unstyled">
                <li><a href="#" class="text-decoration-none text-primary">Ver Reportes de Pacientes</a></li>
                <li><a href="#" class="text-decoration-none text-primary">Actualizar Información Personal</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
