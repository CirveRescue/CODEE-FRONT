<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Detección de Placas')</title>
    <!-- Enlaces a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a Chart.js -->
    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa; /* Color del footer */
            padding: 10px 0;
            text-align: center;
            z-index: 1000;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('head')  <!-- Sección para scripts o estilos adicionales -->
</head>
<body>
    @include('partials.header')  <!-- Incluir el encabezado -->

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>



    @include('partials.footer')  <!-- Incluir el pie de página -->

    <!-- Enlaces a Bootstrap JS y jQuery (opcional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('scripts')  <!-- Sección para scripts adicionales -->
</body>
</html>
