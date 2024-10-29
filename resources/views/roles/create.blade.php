@extends('layouts.app')

@section('title', 'Crear Rol')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Nuevo Rol</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <!-- Campo para el nombre del rol -->
            <div class="form-group mb-3">
                <label for="name">Nombre del Rol</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Botón para crear el rol -->
            <button type="submit" class="btn btn-primary">Crear Rol</button>
        </form>
    </div>
@endsection
