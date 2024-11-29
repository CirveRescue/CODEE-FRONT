@extends('layouts.app')

@section('title', 'Lista de Dispositivos')

@section('content')

    <h1 class="mb-4">Lista de Dispositivos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Dispositivo</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>IP Cámara</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dispositivos as $dispositivo)
                <tr>
                    <td>{{ $dispositivo->ID_Dispositivo }}</td>
                    <td>{{ $dispositivo->Tipo_Dispositivo }}</td>
                    <td>{{ $dispositivo->Ubicacion }}</td>
                    <td>{{ $dispositivo->Estado_Dispositivo }}</td>
                    <td>{{ $dispositivo->IP_Camara }}</td>
                    <td>
                        <a href="{{ route('dispositivos.edit', $dispositivo->ID_Dispositivo) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('dispositivos.destroy', $dispositivo->ID_Dispositivo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay dispositivos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('dispositivos.create') }}" class="btn btn-success">Agregar Nuevo Dispositivo</a>

@endsection
