@extends('layouts.masterCh')

@section('title', 'Buscar Disponibilidad')

@section('content')
    <div class="container mt-5">
        <!-- Card para el botón Buscar Disponibilidad -->
        <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
                <h2 class="mb-0">Buscar Disponibilidad de Citas Médicas</h2>
            </div>
            <div class="card-body" style="background-color: #f8f9fa;">
                <div class="d-flex justify-content-center mb-4">
                    <!-- Botón para abrir el Modal de Agendar Cita -->
                    <button class="btn btn-primary btn-lg shadow-lg" data-bs-toggle="modal" data-bs-target="#agendarCitaModal">
                        <i class="bi bi-search"></i> Buscar Disponibilidad
                    </button>
                </div>


                <div class="text-center mb-4">

                    <img src="https://img.freepik.com/vector-gratis/notificacion-calendario-eventos-proyecto-autonomo-fecha-limite-recordatorio-cita-elemento-diseno-aislado-calendario-megafono-ilustracion-concepto-gestion-tiempo_335657-1693.jpg" alt="Imagen de Médico" class="img-fluid rounded shadow-lg" style="max-height: 350px; object-fit: cover; border-radius: 15px;">
                </div>


                <div class="d-flex justify-content-around">
                    <a href="{{ route('cita.index') }}" class="btn btn-success btn-lg shadow-lg">
                        <i class="bi bi-calendar-check"></i> Volver al Agendar Citas
                    </a>
                    <a href="{{ route('doctor.dashboard') }}" class="btn btn-warning btn-lg shadow-lg">
                        <i class="bi bi-house-door"></i> Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>


        <!-- Modal para Agendar Cita Médica -->
        <div class="modal fade" id="agendarCitaModal" tabindex="-1" aria-labelledby="agendarCitaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(90deg, #007bff, #6610f2);">
                        <h5 class="modal-title text-white" id="agendarCitaModalLabel">Registrar Cita Médica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #f8f9fa;">
                        <div class="row">

                            <div class="col-md-5">

                                <img src="https://img.freepik.com/vector-gratis/notificacion-calendario-eventos-proyecto-autonomo-fecha-limite-recordatorio-cita-elemento-diseno-aislado-calendario-megafono-ilustracion-concepto-gestion-tiempo_335657-1693.jpg" alt="Imagen de médico" class="img-fluid rounded shadow-lg" style="max-height: 300px; object-fit: cover; border-radius: 15px;">
                            </div>

                            <div class="col-md-7">
                                <form action="{{ route('cita.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="especialidad" class="form-label"><strong>Especialidad</strong></label>
                                        <input type="text" class="form-control form-control-lg" id="especialidad" name="especialidad" required>
                                        @error('especialidad')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="fecha" class="form-label"><strong>Fecha</strong></label>
                                        <input type="date" class="form-control form-control-lg" id="fecha" name="fecha" required>
                                        @error('fecha')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="hora" class="form-label"><strong>Hora</strong></label>
                                        <input type="time" class="form-control form-control-lg" id="hora" name="hora" required>
                                        @error('hora')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="estado" class="form-label"><strong>Estado</strong></label>
                                        <select class="form-control form-control-lg" id="estado" name="estado" required>
                                            <option value="pendiente">Pendiente</option>
                                            <option value="confirmada">Confirmada</option>
                                            <option value="cancelada">Cancelada</option>
                                        </select>
                                        @error('estado')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="doctor_id" class="form-label"><strong>Médico Asignado</strong></label>
                                        <select class="form-control form-control-lg" id="doctor_id" name="doctor_id" required>
                                            <option value="">Seleccionar Médico</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="patient_id" class="form-label"><strong>Paciente</strong></label>
                                        <select class="form-control form-control-lg" id="patient_id" name="patient_id" required>
                                            <option value="">Seleccionar Paciente</option>
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('patient_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Registrar Cita</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <a href="{{ route('cita.index') }}" class="btn btn-info btn-lg">
                            <i class="bi bi-calendar-check"></i> Volver al Agendar Citas Médicas
                        </a>
                        <a href="{{ route('doctor.dashboard') }}" class="btn btn-success btn-lg">
                            <i class="bi bi-house-door"></i> Volver al Inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
