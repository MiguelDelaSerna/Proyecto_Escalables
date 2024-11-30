@extends('layouts.app')

@section('title', 'Editar Renta')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Editar Renta</h1>

        <form action="{{ route('rentas.update', $renta->id) }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_videojuego" class="form-label">Videojuego</label>
                <select name="id_videojuego" id="id_videojuego" class="form-select" required>
                    @foreach($videojuegos as $videojuego)
                        <option value="{{ $videojuego->id }}" {{ $renta->id_videojuego == $videojuego->id ? 'selected' : '' }}>{{ $videojuego->titulo }}</option>
                    @endforeach
                </select>
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
                        <option value="{{ $cliente->id }}" {{ $renta->id_cliente == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_renta" class="form-label">Fecha de Renta</label>
                <input type="date" name="fecha_renta" id="fecha_renta" class="form-control" value="{{ $renta->fecha_renta }}" required>
            </div>

            <div class="mb-3">
                <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" value="{{ $renta->fecha_devolucion }}" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="pendiente" {{ $renta->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="devuelto" {{ $renta->estado == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                    <option value="en atraso" {{ $renta->estado == 'en atraso' ? 'selected' : '' }}>En Atraso</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Renta</button>
        </form>
    </div><br><br><br>
@endsection
