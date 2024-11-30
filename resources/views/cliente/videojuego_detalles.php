@extends('layouts.app')

@section('title', 'Detalles del Videojuego')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">{{ $videojuego->titulo }}</h1>

    <div class="row">
        <!-- Información detallada del videojuego -->
        <div class="col-md-6">
            <img src="{{ $videojuego->imagen_url }}" class="img-fluid" alt="{{ $videojuego->titulo }}">
        </div>
        <div class="col-md-6">
            <h3>Descripción:</h3>
            <p>{{ $videojuego->descripcion }}</p>
            <p><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>
            <p><strong>Género:</strong> {{ $videojuego->genero }}</p>
            <p><strong>Precio de Renta:</strong> ${{ number_format($videojuego->precio_renta, 2) }}</p>
            <p><strong>Disponibilidad:</strong> 
                @if($videojuego->disponibilidad)
                    <span class="text-success">Disponible</span>
                @else
                    <span class="text-danger">No Disponible</span>
                @endif
            </p>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('cliente.dashboard') }}" class="btn btn-secondary">Regresar</a>
    </div>
</div>
@endsection
