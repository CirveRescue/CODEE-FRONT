@extends('layouts.app')

@section('title', 'Editar Dispositivo')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" shadow-sm">
    <h1>Editar Dispositivo</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('dispositivos.update', $dispositivo->ID_Dispositivo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Tipo_Dispositivo" class="form-label">Tipo de Dispositivo</label>
            <input type="text" id="Tipo_Dispositivo" name="Tipo_Dispositivo" class="form-control" value="{{ old('Tipo_Dispositivo', $dispositivo->Tipo_Dispositivo) }}" readonly>
        </div>

        <div class="mb-3">
            <label for="Ubicacion" class="form-label">Ubicación</label>
            <select id="Ubicacion" name="Ubicacion" class="form-select" required>
                <option value="entrada" {{ old('Ubicacion', $dispositivo->Ubicacion) == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="salida" {{ old('Ubicacion', $dispositivo->Ubicacion) == 'salida' ? 'selected' : '' }}>Salida</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Estado_Dispositivo" class="form-label">Estado del Dispositivo</label>
            <select id="Estado_Dispositivo" name="Estado_Dispositivo" class="form-select" required>
                <option value="Activo" {{ old('Estado_Dispositivo', $dispositivo->Estado_Dispositivo) == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('Estado_Dispositivo', $dispositivo->Estado_Dispositivo) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="IP_Camara" class="form-label">IP de la Cámara</label>
            <input type="text" id="IP_Camara" name="IP_Camara" class="form-control" value="{{ old('IP_Camara', $dispositivo->IP_Camara) }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar Dispositivo</button>
        <a href="{{ route('dispositivos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</div>
</div>
</div>

@endsection
