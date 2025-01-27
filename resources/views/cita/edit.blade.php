@extends('layouts.masterCh')



@section('content')
<div class="container mt-5">
    <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
            <h2 class="mb-0">Editar Cita Médica</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <form action="{{ route('cita.update', $citas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="fecha" class="form-label"><strong>Fecha</strong></label>
                    <input type="date" id="fecha" name="fecha" class="form-control form-control-lg" value="{{ $cita->fecha }}" required>
                </div>

                <div class="mb-4">
                    <label for="hora" class="form-label"><strong>Hora</strong></label>
                    <input type="time" id="hora" name="hora" class="form-control form-control-lg" value="{{ $cita->hora }}" required>
                </div>

                <div class="mb-4">
                    <label for="especialidad" class="form-label"><strong>Especialidad</strong></label>
                    <input type="text" id="especialidad" name="especialidad" class="form-control form-control-lg" value="{{ $cita->especialidad }}" required>
                </div>

                <div class="mb-4">
                    <label for="estado" class="form-label"><strong>Estado</strong></label>
                    <select id="estado" name="estado" class="form-control form-control-lg" required>
                        <option value="pendiente" {{ $cita->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmada" {{ $cita->estado === 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="cancelada" {{ $cita->estado === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="doctor_id" class="form-label"><strong>Médico Asignado</strong></label>
                    <select id="doctor_id" name="doctor_id" class="form-control form-control-lg" required>
                        <option value="{{ $cita->doctor_id }}">{{ $cita->doctor->nombre }}</option>
                        @foreach($doctors as $doctor)
                            @if($doctor->id !== $cita->doctor_id)
                                <option value="{{ $doctor->id }}">{{ $doctor->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="patient_id" class="form-label"><strong>Paciente</strong></label>
                    <select id="patient_id" name="patient_id" class="form-control form-control-lg" required>
                        <option value="{{ $cita->patient_id }}">{{ $cita->patient->nombre }}</option>
                        @foreach($patients as $patient)
                            @if($patient->id !== $cita->patient_id)
                                <option value="{{ $patient->id }}">{{ $patient->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cita.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar Cita</button>
                </div>
            </form>
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

.form-control-lg {
    border-radius: 10px;
    border: 1px solid #ddd;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.form-control-lg:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.btn-primary {
    background: linear-gradient(90deg, #007bff, #6610f2);
    border: none;
    transition: background 0.3s ease, transform 0.2s ease;
}
.btn-primary:hover {
    background: linear-gradient(90deg, #6610f2, #007bff);
    transform: scale(1.05);
}
</style>
