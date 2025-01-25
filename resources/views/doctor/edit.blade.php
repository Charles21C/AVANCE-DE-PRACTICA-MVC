@extends('layouts.masterCh')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg hover-shadow" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #007bff, #6610f2);">
            <h2 class="mb-0">Editar Doctor</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <form action="{{ route('doctor.update', $doctor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nombre" class="form-label"><strong>Nombre</strong></label>
                    <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $doctor->nombre) }}" required>
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="especialidad" class="form-label"><strong>Especialidad</strong></label>
                    <select name="especialidad" class="form-control form-control-lg" required>
                        <option value="">Seleccionar Especialidad</option>
                        <option value="Cardiología" {{ old('especialidad', $doctor->especialidad) == 'Cardiología' ? 'selected' : '' }}>Cardiología</option>
                        <option value="Medicina general" {{ old('especialidad', $doctor->especialidad) == 'Medicina general' ? 'selected' : '' }}>Medicina general</option>
                        <option value="Medicina Familiar" {{ old('especialidad', $doctor->especialidad) == 'Medicina Familiar' ? 'selected' : '' }}>Medicina Familiar</option>
                        <option value="Gastroenterología" {{ old('especialidad', $doctor->especialidad) == 'Gastroenterología' ? 'selected' : '' }}>Gastroenterología</option>
                        <option value="Ginecología" {{ old('especialidad', $doctor->especialidad) == 'Ginecología' ? 'selected' : '' }}>Ginecología</option>
                        <option value="Neumología" {{ old('especialidad', $doctor->especialidad) == 'Neumología' ? 'selected' : '' }}>Neumología</option>
                        <option value="Nutrición y dietética" {{ old('especialidad', $doctor->especialidad) == 'Nutrición y dietética' ? 'selected' : '' }}>Nutrición y dietética</option>
                        <option value="Otorrinolaringología" {{ old('especialidad', $doctor->especialidad) == 'Otorrinolaringología' ? 'selected' : '' }}>Otorrinolaringología</option>
                        <option value="Psicología" {{ old('especialidad', $doctor->especialidad) == 'Psicología' ? 'selected' : '' }}>Psicología</option>
                        <option value="Odontología" {{ old('especialidad', $doctor->especialidad) == 'Odontología' ? 'selected' : '' }}>Odontología</option>
                        <option value="Pediatría" {{ old('especialidad', $doctor->especialidad) == 'Pediatría' ? 'selected' : '' }}>Pediatría</option>
                        <option value="Traumatología" {{ old('especialidad', $doctor->especialidad) == 'Traumatología' ? 'selected' : '' }}>Traumatología</option>
                    </select>
                    @error('especialidad')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="horario_disponible" class="form-label"><strong>Horario Disponible</strong></label>
                    <div id="horarios-container">
                        @foreach($doctor->horario_disponible as $horario)
                            <div class="input-group mb-2">
                                <input type="text" name="horario_disponible[]" class="form-control datetimepicker" value="{{ old('horario_disponible[]', $horario) }}" placeholder="Seleccione un horario" required>
                                <button type="button" class="btn btn-danger remove-horario"><i class="fas fa-trash"></i></button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-horario" class="btn btn-success btn-sm mt-2">
                        <i class="fas fa-plus"></i> Agregar Horario
                    </button>
                    @error('horario_disponible')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('doctor.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Flatpickr y Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar Flatpickr en los inputs existentes
        function initFlatpickr() {
            document.querySelectorAll('.datetimepicker').forEach(function(input) {
                flatpickr(input, {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    time_24hr: true,
                });
            });
        }

        initFlatpickr();

        // Agregar nuevo campo de horario
        document.getElementById('add-horario').addEventListener('click', function() {
            const container = document.getElementById('horarios-container');
            const newInputGroup = document.createElement('div');
            newInputGroup.classList.add('input-group', 'mb-2');
            newInputGroup.innerHTML = `
                <input type="text" name="horario_disponible[]" class="form-control datetimepicker" placeholder="Seleccione un horario" required>
                <button type="button" class="btn btn-danger remove-horario"><i class="fas fa-trash"></i></button>
            `;
            container.appendChild(newInputGroup);
            initFlatpickr(); // Reinitialize Flatpickr for new inputs
        });

        // Eliminar un horario
        document.getElementById('horarios-container').addEventListener('click', function(e) {
            if (e.target.closest('.remove-horario')) {
                e.target.closest('.input-group').remove();
            }
        });
    });
</script>
@endsection
