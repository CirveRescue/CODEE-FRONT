@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
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
            <div class="form-group">
                <label for="role" class="form-label">Rol:</label>
                <select name="role" id="role" class="form-select">
                    <option value="" disabled selected>Selecciona un rol</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
    @endsection
