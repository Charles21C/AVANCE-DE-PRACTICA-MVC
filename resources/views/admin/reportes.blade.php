@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Generar Reportes</h1>

        <form action="{{ route('admin.generarReportes') }}" method="GET">
            <div class="form-group">
                <label for="start_date">Fecha de Inicio:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">Fecha de Fin:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Generar Reporte</button>
        </form>

        @if(isset($reporte))
            <h2>Reporte Generado:</h2>
            <pre>{{ print_r($reporte) }}</pre> 
        @endif
    </div>
@endsection
