@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

    <h1>Lista de Usuarios y sus Vehículos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Vehículos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->ID_Usuario }}</td>
                    <td>{{ $usuario->Nombre }}</td>
                    <td>{{ $usuario->Correo }}</td>
                    <td>{{ $usuario->Telefono }}</td>
                    <td>
                        @if($usuario->vehiculos->isNotEmpty())
                            <ul>
                                @foreach ($usuario->vehiculos as $vehiculo)
                                    <li>
                                        <strong>Placa:</strong> {{ $vehiculo->Placa }},
                                        <strong>Modelo:</strong> {{ $vehiculo->Modelo }},
                                        <strong>Color:</strong> {{ $vehiculo->Color }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No tiene vehículos registrados</p>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('usuarios.show', $usuario->ID_Usuario) }}" class="btn btn-primary btn-sm me-2">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->ID_Usuario) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->ID_Usuario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $usuarios->links('pagination::bootstrap-4') }}
    </div>



@endsection
