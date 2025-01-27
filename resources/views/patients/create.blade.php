@extends('layouts.masterCh')

@section('title', 'Crear Paciente')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
                <h2 class="mb-0">Crear Paciente</h2>
            </div>
            <div class="card-body" style="background-color: #f8f9fa;">



            
                <form action="{{ route('patients.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="form-label"><strong>Nombre</strong></label>
                        <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="edad" class="form-label"><strong>Edad</strong></label>
                        <input type="number" class="form-control form-control-lg" id="edad" name="edad" required>
                        @error('edad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="genero" class="form-label"><strong>Género</strong></label>
                        <select class="form-control form-control-lg" id="genero" name="genero" required>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                        @error('genero')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="direccion" class="form-label"><strong>Dirección</strong></label>
                        <input type="text" class="form-control form-control-lg" id="direccion" name="direccion" required>
                        @error('direccion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="telefono" class="form-label"><strong>Teléfono</strong></label>
                        <input type="text" class="form-control form-control-lg" id="telefono" name="telefono" required>
                        @error('telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="historial_medico" class="form-label"><strong>Historial Médico</strong></label>
                        <input type="text" name="historial_medico[]" class="form-control form-control-lg" placeholder="Alergias, operaciones, enfermedad catastrófica, etc." required>
                        @error('historial_medico')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Volver</a>
                        <button type="submit" class="btn btn-primary">Guardar Paciente</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    
@endsection

