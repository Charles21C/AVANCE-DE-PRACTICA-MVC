@extends('layouts.masterCh')

@push('styles')
<style>
    body {
        background-color: #f4f7fc; /* Fondo  */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #0056b3;
    }

    .sidebar {
        height: auto; /* Ajustar la altura */
        position: fixed;
        top: 50%; /* Posicionarlo en la mitad */
        left: 0;
        transform: translateY(-50%); /* Centrar verticalmente */
        width: 260px;
        background-color: #4a4e69;
        color: #fff;
        padding: 20px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        border-radius: 0 10px 10px 0; /* Bordes redondeados */
    }

    .sidebar h4 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #f2f2f2;
        margin-bottom: 1.5rem;
    }

    .sidebar a {
        display: block;
        font-size: 1rem;
        color: #f2f2f2;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 8px;
        transition: background-color 0.3s;
    }

    .sidebar a:hover {
        background-color: #9a8c98;
    }

    .content {
        margin-left: 200px; /* Espacio ajustado al ancho del sidebar */
        padding: 30px;
    }

    .card {
        border: none;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table {
        box-shadow: none;
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background-color: #6c63ff;
        color: #fff;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .btn {
        font-size: 0.85rem;
        padding: 8px 12px;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .btn-sm {
        margin: 0 4px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-info:hover {
        background-color: #138496;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #bd2130;
    }

    .alert {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush


@section('content')
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}">Menú Principal</a>
        <a href="{{ route('patients.index') }}">Listado de Pacientes</a>
        <a href="{{ route('patients.create') }}">Registrar Paciente</a>
        <hr style="border-color: #fff;">
        <a href="{{ route('cita.create') }}">Agendar Cita</a>
        <a href="{{ route('cita.index') }}">Consultar Citas</a>
        <a href="#">Cancelar Cita</a>
        <hr style="border-color: #fff;">
        <a href="{{ route('cita.index') }}">Reportes</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h1 class="mb-4 text-center">Pacientes</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm table-container">
            <div class="card-body">
                <div class="create-btn-container text-end mb-3">
                    <a href="{{ route('patients.create') }}" class="btn btn-primary">Crear Paciente</a>
                </div>
                <table class="table table-hover mt-3">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Género</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Historial Médico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                            <tr class="text-center align-middle">
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->nombre }}</td>
                                <td>{{ $patient->edad }}</td>
                                <td>{{ $patient->genero }}</td>
                                <td>{{ $patient->direccion }}</td>
                                <td>{{ $patient->telefono }}</td>
                                <td>
                                    @if(is_array($patient->historial_medico) && count($patient->historial_medico) > 0)
                                        @foreach($patient->historial_medico as $item)
                                            <p class="mb-1">{{ $item }}</p>
                                        @endforeach
                                    @else
                                        <p>No hay historial médico disponible</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Paciente?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
