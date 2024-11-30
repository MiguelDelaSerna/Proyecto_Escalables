@extends('layouts.app')

@section('title', 'Agregar Videojuego')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Agregar Videojuego</h1>

        <form action="{{ route('videojuegos.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="imagen_portada" class="form-label">Portada del Videojuego:</label>
                <input type="file" name="imagen_portada" id="imagen_portada" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="plataforma" class="form-label">Plataforma:</label>
                <input type="text" name="plataforma" id="plataforma" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género:</label>
                <input type="text" name="genero" id="genero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="precio_renta" class="form-label">Precio de Renta:</label>
                <input type="number" step="0.01" name="precio_renta" id="precio_renta" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="disponibilidad" class="form-label">Disponibilidad:</label>
                <select name="disponibilidad" id="disponibilidad" class="form-select">
                    <option value="1">Disponible</option>
                    <option value="0">No Disponible</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form><br><br><br>
    </div>
@endsection
