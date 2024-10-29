<div class="d-flex">
    <!-- Barra lateral -->
    <nav class="navbar navbar-expand-lg navbar-dark flex-column" style="background-color: #33179c; min-height: 100vh; width: 250px;">
        <div class="d-flex flex-column align-items-start w-100">
            <!-- Mostrar el nombre del usuario antes del logo -->
            @if(Auth::check())
                <span class="navbar-text text-white mb-3">
                    Bienvenido, {{ Auth::user()->name }}
                </span>
            @endif

            <!-- Logo de CODEE -->
            <a class="navbar-brand text-white font-weight-bold d-flex align-items-center mb-4" href="{{ url('/dashboard') }}">
                <i class="fas fa-car me-2" style="font-size: 1.8rem;"></i> <!-- Icono de auto con espacio a la derecha -->
                <span style="font-size: 1.5rem;">CODEE</span>
            </a>


            <div class="nav-item mb-3">
                <a class="nav-link nav-link-custom d-flex align-items-center" id="gestionarUsuariosBtn" data-bs-toggle="collapse" href="#gestionarVehiculosCollapse" role="button" aria-expanded="false" aria-controls="gestionarVehiculosCollapse">
                    <i class="fas fa-user-plus me-2" style="font-size: 1.2rem;"></i> <!-- Icono de nuevo perfil -->
                    <span>Administrar Vehiculos</span>
                </a>
                <div class="collapse mt-2" id="gestionarVehiculosCollapse">
                    <ul class="list-group">
                        <!-- Enlace para crear un nuevo perfil -->
                        <li class="list-group-item {{ request()->routeIs('usuarios.index') ? 'active' : '' }}">
                            <a class="text-decoration-none" href="{{ route('usuarios.index') }}">
                                <i class="fas fa-user-plus me-2" style="font-size: 1.2rem;"></i>
                                Lista de Vehiculos
                            </a>
                        </li>
                        <!-- Enlace para crear un nuevo rol -->
                        <li class="list-group-item {{ request()->routeIs('VehiclesIn.index') ? 'active' : '' }}">
                            <a class="text-decoration-none" href="{{ route('VehiclesIn.index') }}">
                                <i class="fas fa-user-shield me-2" style="font-size: 1.2rem;"></i>
                                Lista de Entradas
                            </a>
                        </li>
                        <!-- Enlace para listar roles -->
                        <li class="list-group-item {{ request()->routeIs('VehiclesOut.index') ? 'active' : '' }}">
                            <a class="text-decoration-none" href="{{ route('VehiclesOut.index') }}">
                                <i class="fas fa-list me-2" style="font-size: 1.2rem;"></i>
                                Lista de Salidas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-item mb-3">
                <a class="nav-link nav-link-custom d-flex align-items-center" id="gestionarUsuariosBtn" data-bs-toggle="collapse" href="#gestionarUsuariosCollapse" role="button" aria-expanded="false" aria-controls="gestionarUsuariosCollapse">
                    <i class="fas fa-user-plus me-2" style="font-size: 1.2rem;"></i> <!-- Icono de nuevo perfil -->
                    <span>Administrar Perfiles y Roles</span>
                </a>
                <div class="collapse mt-2" id="gestionarUsuariosCollapse">
                    <ul class="list-group">
                        <!-- Enlace para crear un nuevo perfil -->
                        <li class="list-group-item {{ request()->routeIs('register') ? 'active' : '' }}">
                            <a class="text-decoration-none" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-2" style="font-size: 1.2rem;"></i>
                                Nuevo Perfil
                            </a>
                        </li>
                        <!-- Enlace para crear un nuevo rol -->
                        <li class="list-group-item {{ request()->routeIs('roles.create') ? 'active' : '' }}">
                            <a class="text-decoration-none" href="{{ route('roles.create') }}">
                                <i class="fas fa-user-shield me-2" style="font-size: 1.2rem;"></i>
                                Nuevo Rol
                            </a>
                        </li>
                        <!-- Enlace para listar roles -->
                        <li class="list-group-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                            <a class="text-decoration-none" href="{{ route('roles.index') }}">
                                <i class="fas fa-list me-2" style="font-size: 1.2rem;"></i>
                                Lista de Roles
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Botón de cerrar sesión alineado abajo -->
        <div class="mt-auto">
            <a class="nav-link text-white d-flex align-items-center" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                style="position: relative;">
                <i class="fas fa-door-open" style="font-size: 1.2rem; animation: pulse 2s infinite;"></i> <!-- Ícono animado -->
                <span style="margin-left: 8px;">Logout</span>
            </a>
        </div>

    </nav>

    <!-- Contenido principal -->

    <div class="container-fluid" style="padding-left: 20px; padding-rigth: 50px;">
        <br>
        <br> <!-- Ajusta el valor según el ancho de tu menú lateral -->
        @yield('content')

    </div>


</div>

<!-- Formulario para cerrar sesión -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

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
