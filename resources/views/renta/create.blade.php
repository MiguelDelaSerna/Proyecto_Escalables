@extends('layouts.app')

@section('title', 'Registrar Renta')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Registrar Nueva Renta</h1>

        <form action="{{ route('rentas.store') }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            <div class="mb-3">
                <label for="id_videojuego" class="form-label">Videojuego</label>
                <select name="id_videojuego" id="id_videojuego" class="form-select" required>
                    @foreach($videojuegos as $videojuego)
                        <option value="{{ $videojuego->id }}">{{ $videojuego->titulo }}</option>
                    @endforeach
                </select>

                <!-- Mostrar mensaje de error si el videojuego no está disponible -->
                @if ($errors->has('id_videojuego'))
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first('id_videojuego') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select name="id_cliente" id="id_cliente" class="form-select" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_renta" class="form-label">Fecha de Renta</label>
                <input type="date" name="fecha_renta" id="fecha_renta" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="pendiente">Pendiente</option>
                    <option value="devuelto">Devuelto</option>
                    <option value="en atraso">En Atraso</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Registrar Renta</button>
            </div>
        </form><br><br><br>
    </div>
@endsection
