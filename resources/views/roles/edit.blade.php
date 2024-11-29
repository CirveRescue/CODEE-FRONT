@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" shadow-sm">
<div class="container">
    <h1 class="my-4">Editar Rol</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="{{ $role->name }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
