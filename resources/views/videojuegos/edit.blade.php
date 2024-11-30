@extends('layouts.app')

@section('title', 'Editar Videojuego')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Editar Videojuego</h1>

        <form action="{{ route('videojuegos.update', $videojuego) }}" method="POST" class="mx-auto" style="max-width: 600px;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $videojuego->titulo }}" required>
            </div>

            <div class="mb-3">
                <label for="imagen_portada" class="form-label">Portada del Videojuego:</label>
                @if ($videojuego->imagen_portada)
                    <img src="{{ asset('images/videojuegos/' . $videojuego->imagen_portada) }}" alt="Portada" class="img-thumbnail mb-2" style="max-width: 200px;">
                @endif
                <input type="file" name="imagen_portada" id="imagen_portada" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $videojuego->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="plataforma" class="form-label">Plataforma:</label>
                <input type="text" name="plataforma" id="plataforma" class="form-control" value="{{ $videojuego->plataforma }}" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género:</label>
                <input type="text" name="genero" id="genero" class="form-control" value="{{ $videojuego->genero }}" required>
            </div>

            <div class="mb-3">
                <label for="precio_renta" class="form-label">Precio de Renta:</label>
                <input type="number" step="0.01" name="precio_renta" id="precio_renta" class="form-control" value="{{ $videojuego->precio_renta }}" required>
            </div>

            <div class="mb-3">
                <label for="disponibilidad" class="form-label">Disponibilidad:</label>
                <select name="disponibilidad" id="disponibilidad" class="form-select">
                    <option value="1" {{ $videojuego->disponibilidad ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ !$videojuego->disponibilidad ? 'selected' : '' }}>No Disponible</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form><br><br><br>
    </div>
@endsection
