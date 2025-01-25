@extends('layouts.masterCh')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
            <h2 class="mb-0">Detalles del Paciente</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nombre:</strong> {{ $patient->nombre }}</li>
                <li class="list-group-item"><strong>Edad:</strong> {{ $patient->edad }}</li>
                <li class="list-group-item"><strong>Género:</strong> {{ $patient->genero }}</li>
                <li class="list-group-item"><strong>Dirección:</strong> {{ $patient->direccion }}</li>
                <li class="list-group-item"><strong>Teléfono:</strong> {{ $patient->telefono }}</li>

                <li class="list-group-item">
                <strong>Historial Médico:</strong> 
               @if (is_array($patient->historial_medico))
                    {{ implode(', ', $patient->historial_medico) }}
                @else
                   {{ implode(', ', json_decode($patient->historial_medico)) }}
              @endif
            </li>

             
            </ul>
        </div>
        <div class="card-footer text-end" style="background-color: #f1f1f1;">
            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection

<style>
.card.hover-shadow {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.list-group-item {
    border: none;
    padding: 15px 20px;
    background-color: #ffffff;
    transition: background-color 0.2s ease;
}
.list-group-item:hover {
    background-color: rgb(228, 228, 228);
}

.list-group-item ul {
    margin: 0;
    padding: 0;
    list-style-type: disc;
    padding-left: 20px;
}

.btn-secondary {
    background: linear-gradient(90deg, #6c757d, #343a40);
    border: none;
    transition: background 0.3s ease, transform 0.2s ease;
}
.btn-secondary:hover {
    background: linear-gradient(90deg, #343a40, #6c757d);
    transform: scale(1.05);
}
</style>
