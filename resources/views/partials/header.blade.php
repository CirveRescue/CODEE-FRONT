<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #33179c; margin-top: 0;">
                <!-- Mostrar el nombre del usuario antes del logo -->
                @if(Auth::check())
                <span class="navbar-text text-white mr-3">
                    Bienvenido, {{ Auth::user()->name }}
                </span>
                @endif

    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">

            <!-- Logo de Detección de Placas -->
            <a class="navbar-brand text-white font-weight-bold d-flex align-items-center" href="{{ url('/dashboard') }}">
                <i class="fas fa-car" style="font-size: 1.5rem; margin-right: 10px;"></i> <!-- Icono de auto -->
                Detección de Placas
            </a>
            <a class="nav-link text-white" href="{{ route('usuarios.index') }}">
                <i class="fas fa-users"></i> Usuarios
            </a>
        </div>

        <!-- Botón para menú responsive en pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú colapsable -->

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">

                <!-- Botón de cerrar sesión alineado completamente a la derecha -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        style="position: relative;">
                        <i class="fas fa-door-open" style="font-size: 1.2rem; animation: pulse 2s infinite;"></i> <!-- Ícono animado -->
                        <span style="margin-left: 8px;">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Formulario para cerrar sesión -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>

<!-- Incluye FontAwesome para los iconos -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Estilos de animación -->
<style>
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
</style>
