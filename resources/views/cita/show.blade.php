@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
            <h2 class="mb-0">Detalles de la Cita Médica</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>ID:</strong> {{ $cita->id }}</li>
                <li class="list-group-item"><strong>Fecha y Hora:</strong> 
                    {{ \Carbon\Carbon::parse($cita->fecha . ' ' . $cita->hora)->format('d/m/Y H:i') }}
                </li>
                <li class="list-group-item"><strong>Especialidad:</strong> {{ $cita->especialidad }}</li>
                <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($cita->estado) }}</li>
                <li class="list-group-item"><strong>Médico Asignado:</strong> {{ $cita->doctor->nombre }}</li>
                <li class="list-group-item"><strong>Paciente:</strong> {{ $cita->patient->nombre }}</li>
            </ul>
        </div>
        <div class="card-footer text-end" style="background-color: #f1f1f1;">
            <a href="{{ route('cita.index') }}" class="btn btn-secondary">Volver</a>
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
</style>
