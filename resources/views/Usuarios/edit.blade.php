@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->ID_Usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" name="Nombre" class="form-control" value="{{ $usuario->Nombre }}" required>
        </div>

        <div class="form-group">
            <label for="Correo">Correo Electrónico</label>
            <input type="email" name="Correo" class="form-control" value="{{ $usuario->Correo }}" required>
        </div>

        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="text" name="Telefono" class="form-control" value="{{ $usuario->Telefono }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
