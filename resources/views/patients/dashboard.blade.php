@extends('layouts.masterCh')

@section('content')
    <div class="container">
        <h1>Panel de Administración</h1>
        
        <div class="action-links">
            <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Gestionar Usuarios</a>
            <a href="{{ route('admin.generarReportes') }}" class="btn btn-primary">Generar Reportes</a>
        </div>
    </div>
@endsection
