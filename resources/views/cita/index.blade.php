@extends('layouts.master')

@section('title', 'Listado de Citas Médicas')

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

        .table {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
        }

        thead {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }

        tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .btn-sm {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .alert {
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 0.9rem;
            margin-top: 20px;
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

        .text-center {
            text-align: center;
        }
    </style>
@endpush

@section('content')
<div class="container my-5">
    <h1>Listado de Citas Médicas</h1>
    
    <div class="text-center mb-3">
        <a href="{{ route('cita.create') }}" class="btn btn-primary btn-create">Crear Nueva Cita</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Fecha y Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->paciente->nombre }}</td> 
                        <td>{{ $item->medico?->nombre ?? 'Sin médico asignado' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->fecha . ' ' . $item->hora)->format('d/m/Y H:i') }}</td> <!-- Fecha y Hora -->
                        <td>{{ $item->estado }}</td>
                        <td>
                            <a href="{{ route('cita.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('cita.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('cita.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta cita?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
