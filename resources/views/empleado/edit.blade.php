@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Editar Empleado</h1>

        <form action="{{ route('empleado.empleados.update', $empleado->id) }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            @method('PUT') <!-- Indica que es una solicitud PUT -->

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email', $empleado->email) }}" class="form-control" required>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $empleado->telefono) }}" class="form-control" required>
            </div>

            <!-- Botón Actualizar -->
            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('empleado.empleados.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
