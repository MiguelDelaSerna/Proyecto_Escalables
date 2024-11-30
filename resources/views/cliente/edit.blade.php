@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Editar Cliente</h1>

        <form action="{{ route('cliente.clientes.update', $cliente->id) }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            @method('PUT') <!-- Importante para hacer una solicitud PUT en lugar de POST -->

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $cliente->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('cliente.clientes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form><br><br><br>
    </div>
@endsection
