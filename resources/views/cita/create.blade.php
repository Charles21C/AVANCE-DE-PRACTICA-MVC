@extends('layouts.master')

@section('title', 'Agendar Cita Médica')

@push('styles')
<style>
    h1 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 2.8rem;
        font-weight: bold;
        color: #28a745;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        text-align: center;
        margin-bottom: 40px;
    }
    .btn-create {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1.1rem;
        font-weight: bold;
        border-radius: 50px;
        transition: all 0.3s ease-in-out;
    }
    .btn-create:hover {
        background-color: #218838;
        color: #fff;
        transform: scale(1.05);
    }
    .modal-content {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@section('content')
<div class="container my-5">
    <h1>Agendar Nueva Cita Médica</h1>

    <!-- Mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario --> 

    <form action="{{ route('cita.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <select name="especialidad" id="especialidad" class="form-control" required>
            <option value="" disabled selected>Seleccionar Especialidad</option>
            @foreach ($especialidades as $especialidad)
                <option value="{{ $especialidad }}">{{ $especialidad }}</option>
            @endforeach
        </select>
    </div>

    <button type="button" id="btnBuscarDisponibilidad" class="btn btn-success btn-create">Buscar Disponibilidad</button>

    <div id="seleccion" class="mt-4" style="display: none;">
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Médico Seleccionado</label>
            <input type="text" class="form-control" id="doctor_nombre" readonly>
            <input type="hidden" name="doctor_id" id="doctor_id">
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora Seleccionada</label>
            <input type="text" class="form-control" id="hora" name="hora" readonly>
        </div>

        <button type="submit" class="btn btn-primary btn-create">Guardar Cita</button>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="modalDisponibilidad" tabindex="-1" aria-labelledby="modalDisponibilidadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDisponibilidadLabel">Horarios Disponibles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Horario</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-disponibilidad">
                        <!-- Aquí se llenarán los horarios disponibles -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





@endsection

@push('scripts')
<script>
document.getElementById('btnBuscarDisponibilidad').addEventListener('click', function () {
    const especialidad = document.getElementById('especialidad').value;

    if (!especialidad) {
        alert('Seleccione una especialidad primero.');
        return;
    }

    // Llamar a la API para obtener disponibilidad
    fetch(`/disponibilidad?especialidad=${especialidad}`)
        .then(response => response.json())
        .then(data => {
            const tabla = document.getElementById('tabla-disponibilidad');
            tabla.innerHTML = '';

            if (data.length === 0) {
                tabla.innerHTML = '<tr><td colspan="3" class="text-center">No hay horarios disponibles.</td></tr>';
            } else {
                data.forEach(item => {
                    tabla.innerHTML += `
                        <tr>
                            <td>${item.doctor}</td>
                            <td>${item.horario}</td>
                            <td>
                                <button class="btn btn-primary btn-seleccionar" 
                                    data-doctor-id="${item.doctor_id}" 
                                    data-doctor-nombre="${item.doctor}" 
                                    data-horario="${item.horario}">
                                    Seleccionar
                                </button>
                            </td>
                        </tr>
                    `;
                });

                // Asignar evento a botones de seleccionar
                document.querySelectorAll('.btn-seleccionar').forEach(btn => {
                    btn.addEventListener('click', function () {
                        document.getElementById('doctor_id').value = this.dataset.doctorId;
                        document.getElementById('doctor_nombre').value = this.dataset.doctorNombre;
                        document.getElementById('hora').value = this.dataset.horario;

                        document.getElementById('seleccion').style.display = 'block';
                        new bootstrap.Modal(document.getElementById('modalDisponibilidad')).hide();
                    });
                });
            }
        });

    // Abrir el modal
    new bootstrap.Modal(document.getElementById('modalDisponibilidad')).show();
});

</script>
@endpush
