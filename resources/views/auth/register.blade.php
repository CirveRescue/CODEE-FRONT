<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Aquí puedes agregar estilos personalizados */
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Registrarse</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <p class="mt-3">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></p>
    </div>
</body>
</html>
