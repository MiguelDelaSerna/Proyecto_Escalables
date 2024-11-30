@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Crear Empleado</h1>

        <form action="{{ route('empleado.empleados.store') }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>


            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" class="form-control">
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <!-- Botón Guardar -->
            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('empleado.empleados.index') }}" class="btn btn-secondary">Cancelar</a>
            </div><br><br><br><br>
        </form>
    </div>
@endsection
