@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
    <h1>Detalles del Usuario</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $usuario->Nombre }}</h3>
            <p><strong>Correo Electrónico:</strong> {{ $usuario->Correo }}</p>
            <p><strong>Teléfono:</strong> {{ $usuario->Telefono }}</p>

            <h4>Vehículos</h4>
            @if($usuario->vehiculos->isNotEmpty())
                <ul>
                    @foreach ($usuario->vehiculos as $vehiculo)
                        <li>
                            <strong>Placa:</strong> {{ $vehiculo->Placa }},
                            <strong>Modelo:</strong> {{ $vehiculo->Modelo }},
                            <strong>Color:</strong> {{ $vehiculo->Color }},
                            <strong>Año:</strong> {{ $vehiculo->Año }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Este usuario no tiene vehículos registrados.</p>
            @endif

            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
@endsection
