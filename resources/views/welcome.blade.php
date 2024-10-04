<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detección de Placas</title>
    <!-- Enlaces a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlace a Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container text-center">
        <h1 class="mt-4">Detección de Placas en Tiempo Real</h1>
        <input id="plate-input" type="text" class="form-control mb-4 text-center" readonly>  <!-- Input para mostrar las placas detectadas -->

        <canvas id="plateChart" width="400" height="200"></canvas>  <!-- Gráfica para mostrar la cantidad de placas detectadas -->
    </div>

    <script>
    // websocket.js

        // Crea una nueva conexión WebSocket
        const socket = new WebSocket("ws://127.0.0.1:8000/ws/detected-plates");

        // Inicializar el gráfico
        const ctx = document.getElementById('plateChart').getContext('2d');
        const plateChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [], // Etiquetas de las placas
                datasets: [{
                    label: 'Número de detecciones',
                    data: [], // Datos de detecciones
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Evento cuando la conexión se abre
        socket.onopen = function(event) {
            console.log("Conexión al WebSocket establecida.");
        };

        // Evento cuando se recibe un mensaje del servidor
        socket.onmessage = function(event) {
            const plateText = event.data;
            console.log("Placa detectada:", plateText);

            // Reemplazar el contenido del input con la placa detectada
            const plateInput = document.getElementById("plate-input");
            plateInput.value = plateText;  // Actualizar el input con la nueva placa

            // Actualizar gráfico
            updateChart(plateText);
        };

        // Evento cuando hay un error en la conexión
        socket.onerror = function(error) {
            console.error("Error en el WebSocket:", error);
        };

        // Evento cuando la conexión se cierra
        socket.onclose = function(event) {
            console.log("Conexión al WebSocket cerrada.");
        };

        function updateChart(plateText) {
            // Verificar si la placa ya existe en las etiquetas
            const index = plateChart.data.labels.indexOf(plateText);

            if (index === -1) {
                // Si no existe, agregar la placa como nueva etiqueta
                plateChart.data.labels.push(plateText);
                plateChart.data.datasets[0].data.push(1); // Inicializar en 1
            } else {
                // Si ya existe, incrementar el conteo
                plateChart.data.datasets[0].data[index] += 1;
            }

            // Actualizar el gráfico
            plateChart.update();
        }
    </script>
    <!-- Enlaces a Bootstrap JS y jQuery (opcional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
