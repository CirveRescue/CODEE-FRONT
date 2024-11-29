@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
<div id="alert-container" class="mt-3"></div>

    <div class="row">
        <div class="col-md-12">
            <h3>Entradas y Salidas de Vehículos</h3>
            <canvas id="entradasSalidasChart"></canvas>
        </div>
    </div>
    <br>
    <div class="row mt-4">
        <div class="col text-center">
            <form action="{{ route('placas.manual-entry') }}" method="POST">
                @csrf
                <div class="form-group d-inline-block">
                    <label for="placa" class="me-2">Ingresa la Placa manual</label>
                    <input type="text" id="placa" name="placa" class="form-control d-inline-block " placeholder="Ingrese la placa" required>
                </div>
                <button type="submit" class="btn btn-danger">Dejar entrar Manualmente</button>
            </form>
        </div>
    </div>

    <br>
    <br>

    @include('VehiclesIn.table')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxEntradasSalidas = document.getElementById('entradasSalidasChart').getContext('2d');

        // Entradas y Salidas
        const entradasSalidasChart = new Chart(ctxEntradasSalidas, {
    type: 'doughnut',
    data: {
        labels: ['Entradas', 'Salidas'],
        datasets: [{
            label: 'No. Vehiculos',
            data: [{{ $totalEntradas }}, {{ $totalSalidas }}],
            backgroundColor: ['#36a2eb', '#ff6384'],
        }]
    },
    options: {
        responsive: true,
        aspectRatio: 6,  // Relación de aspecto 1:1 (cuadrado)
    }
});

    // Función para agregar mensajes o notificaciones
    function agregarMensaje(mensaje) {
        const alertContainer = document.querySelector("#alert-container");
        const alert = document.createElement("div");
        alert.className = "alert alert-info";
        alert.innerText = mensaje;
        alertContainer.appendChild(alert);
        setTimeout(() => alert.remove(), 1000); // Eliminar mensaje después de 5 segundos
    }

    const logSocket = new WebSocket('ws://127.0.0.1:8000/ws/logs');

    logSocket.onmessage = function(event) {
        agregarMensaje(event.data); // Usa la misma función agregarMensaje definida antes
    };

    logSocket.onerror = function(error) {
        console.error("Error en WebSocket de logs:", error);
    };
</script>


@endsection
