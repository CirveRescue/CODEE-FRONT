@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard de Entradas y Salidas</h1>
    <div>
        <canvas id="entradasChart" width="400" height="400"></canvas>
    </div>
    <div>
        <canvas id="salidasChart" width="400" height="400"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxEntradas = document.getElementById('entradasChart').getContext('2d');
        const ctxSalidas = document.getElementById('salidasChart').getContext('2d');

        const entradasChart = new Chart(ctxEntradas, {
            type: 'doughnut',
            data: {
                labels: ['Entradas Hoy', 'Total Entradas'],
                datasets: [{
                    label: 'Entradas',
                    data: [{{ $entradasHoy }}, {{ $totalEntradas - $entradasHoy }}],
                    backgroundColor: ['#36a2eb', '#ff6384'],
                }]
            },
            options: {
                responsive: true,
            }
        });

        const salidasChart = new Chart(ctxSalidas, {
            type: 'doughnut',
            data: {
                labels: ['Salidas Hoy', 'Total Salidas'],
                datasets: [{
                    label: 'Salidas',
                    data: [{{ $salidasHoy }}, {{ $totalSalidas - $salidasHoy }}],
                    backgroundColor: ['#ffce56', '#ff6384'],
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>
@endsection
