@extends('layouts.app')

@section('title', 'Agregar Dispositivo')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class=" shadow-sm">
                <div >
                    <h3 class="mb-0">Agregar Nuevo Dispositivo</h3>
                    <br>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('dispositivos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Tipo_Dispositivo" class="form-label">Tipo de Dispositivo</label>
                            <input type="text" id="Tipo_Dispositivo" name="Tipo_Dispositivo" class="form-control" value="{{ old('Tipo_Dispositivo', $tipoDispositivoIncremental) }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="Ubicacion" class="form-label">Ubicación</label>
                            <select id="Ubicacion" name="Ubicacion" class="form-select">
                                <option value="" disabled selected>Selecciona una opción</option>
                                <option value="Entrada" {{ old('Ubicacion') == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                                <option value="Salida" {{ old('Ubicacion') == 'Salida' ? 'selected' : '' }}>Salida</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="Estado_Dispositivo" class="form-label">Estado del Dispositivo</label>
                            <select id="Estado_Dispositivo" name="Estado_Dispositivo" class="form-select" required>
                                <option value="" disabled selected>Selecciona un estado</option>
                                <option value="Activo" {{ old('Estado_Dispositivo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ old('Estado_Dispositivo') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="IP_Camara" class="form-label">URL de la Cámara</label>
                            <input type="text" id="IP_Camara" name="IP_Camara" class="form-control" value="{{ old('IP_Camara') }}" required>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('dispositivos.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
