@extends('layouts.masterCh')

@section('title', 'Editar Paciente')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
            <h2 class="mb-0">Editar Paciente</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="nombre" class="form-label"><strong>Nombre</strong></label>
                    <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $patient->nombre) }}" placeholder="Ingrese el nombre" required>
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="edad" class="form-label"><strong>Edad</strong></label>
                    <input type="text" name="edad" class="form-control form-control-lg" value="{{ old('edad', $patient->edad) }}" placeholder="Ingrese la edad" required>
                    @error('edad')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="genero" class="form-label"><strong>Género</strong></label>
                    <input type="text" name="genero" class="form-control form-control-lg" value="{{ old('genero', $patient->genero) }}" placeholder="Ingrese el género" required>
                    @error('genero')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="direccion" class="form-label"><strong>Dirección</strong></label>
                    <input type="text" name="direccion" class="form-control form-control-lg" value="{{ old('direccion', $patient->direccion) }}" placeholder="Ingrese la dirección" required>
                    @error('direccion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="telefono" class="form-label"><strong>Teléfono</strong></label>
                    <input type="text" name="telefono" class="form-control form-control-lg" value="{{ old('telefono', $patient->telefono) }}" placeholder="Ingrese el teléfono" required>
                    @error('telefono')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="historial_medico" class="form-label"><strong>Historial Médico</strong></label>
                    <div id="historial-container">
            
                    @foreach($patient->historial_medico as $historial)
                            
                                    <input type="text" name="historial_medico[]" class="form-control form-control-lg" value="{{ $historial }}" placeholder="Ingrese un elemento del historial médico">
                                    <button type="button" class="btn btn-danger btn-sm remove-historial">Eliminar</button>
                                </div>
                            @endforeach

                            
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

