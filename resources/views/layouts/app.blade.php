<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Detección de Placas')</title>
    <!-- Enlaces a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        /* Asegurar que el body ocupe toda la pantalla */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Estructura con Flexbox para hacer que el footer siempre esté al final */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* El contenido principal ocupa el espacio disponible */
        .main-content {
            flex: 1;
            padding: 20px; /* Ajusta este padding según tus necesidades */
        }

        /* Estilos para el footer */
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }

        /* Mantener el texto del enlace en blanco */
        .nav-link-custom {
            color: #ffffff !important; /* Texto en blanco */
        }

        /* Aplicar el color #33179c solo al ícono */
        .nav-link-custom i {
            color: #33179c !important;
        }

        /* Estilo para los items de la lista colapsada */
        .list-group-item {
            background-color: #33179c !important; /* Fondo púrpura */
            border: none; /* Eliminar bordes para mejor apariencia */
        }

        /* Texto blanco en los elementos de la lista */
        .list-group-item a {
            color: #ffffff !important;
        }

        /* Estilo para hover en los items */
        .list-group-item a:hover {
            color: #ffffff !important;
            opacity: 0.8;
        }

        /* Fondo del contenedor colapsable */
        #gestionarUsuariosCollapse {
            background-color: #33179c;
            border-radius: 0.25rem;
        }

        /* Estilo para el elemento activo */
        .list-group-item.active {
            background-color: #5648cc !important;
            color: #ffffff !important;
        }

        .list-group-item.active a {
            color: #ffffff !important;
        }
    </style>

    <!-- Enlace a Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('head') <!-- Sección para scripts o estilos adicionales -->
</head>
<body>
    <div class="content-wrapper">
        @include('partials.header')  <!-- Incluir el encabezado -->
        <!-- Agregar spinner de carga -->
    <div id="loadingSpinner" style="display: none;">Reiniciando...</div>
        {{-- <!-- Footer -->
        <footer>
            <p>&copy; {{ date('Y') }} Detección de Placas. Todos los derechos reservados.</p>
        </footer> --}}
        @include('partials.footer')
    </div>

    <!-- Enlaces a Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts') <!-- Sección para scripts adicionales -->
</body>
</html>
