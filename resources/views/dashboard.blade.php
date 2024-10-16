@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard de Entradas y Salidas</h1>

    <div class="row">
        <div class="col-md-4">
            <h3>Carros Adentro</h3>
            <canvas id="carrosAdentroChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-4">
            <h3>Carros de Salida</h3>
            <canvas id="carrosSalidaChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-4">
            <h3>Total de Carros</h3>
            <canvas id="totalCarrosChart" width="400" height="400"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxCarrosAdentro = document.getElementById('carrosAdentroChart').getContext('2d');
        const ctxCarrosSalida = document.getElementById('carrosSalidaChart').getContext('2d');
        const ctxTotalCarros = document.getElementById('totalCarrosChart').getContext('2d');

        // Carros Adentro
        const carrosAdentroChart = new Chart(ctxCarrosAdentro, {
            type: 'doughnut',
            data: {
                labels: ['Carros Adentro'],
                datasets: [{
                    label: 'Carros Adentro',
                    data: [{{ $vehiculosDentro->count() }}],
                    backgroundColor: ['#36a2eb'],
                }]
            },
            options: {
                responsive: true,
            }
        });

        // Carros de Salida
        const carrosSalidaChart = new Chart(ctxCarrosSalida, {
            type: 'doughnut',
            data: {
                labels: ['Carros de Salida'],
                datasets: [{
                    label: 'Carros de Salida',
                    data: [{{ $salidasHoy }}, {{ $totalSalidas }}],
                    backgroundColor: ['#ffce56', '#ff6384'],
                }]
            },
            options: {
                responsive: true,
            }
        });

        // Total de Carros
        const totalCarrosChart = new Chart(ctxTotalCarros, {
            type: 'doughnut',
            data: {
                labels: ['Total de Carros'],
                datasets: [{
                    label: 'Total de Carros',
                    data: [{{ $totalEntradas }}, {{ $totalEntradas - $vehiculosDentro->count() }}],
                    backgroundColor: ['#4bc0c0', '#ff6384'],
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>

    <!-- Tabla de Entradas -->
    <h2>Entradas Recientes</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Hora de Entrada</th>
                <th>Dueño</th> <!-- Nuevo campo para mostrar el dueño del vehículo -->
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculosDentro as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->color }}</td>
                    <td>{{ $vehiculo->fecha_entrada }}</td>
                    <td>{{ $vehiculo->usuario->nombre }}</td> <!-- Mostramos el nombre del usuario/dueño -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
