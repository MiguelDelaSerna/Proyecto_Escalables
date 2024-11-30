@extends('layouts.app')

@section('title', $videojuego->titulo)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset('images/videojuegos/' . $videojuego->imagen_portada) }}" class="img-fluid" style="max-width: 350px;" alt="{{ $videojuego->titulo }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $videojuego->titulo }}</h1>
            <p>{{ $videojuego->descripcion }}</p>
            <p><strong>Plataforma:</strong> {{ $videojuego->plataforma }}</p>
            <p><strong>Género:</strong> {{ $videojuego->genero }}</p>
            <p><strong>Precio de Renta:</strong> ${{ $videojuego->precio_renta }}</p>
            <p><strong>Disponibilidad:</strong> 
                @if($videojuego->disponibilidad)
                    <span class="text-success">Disponible</span>
                @else
                    <span class="text-danger">No Disponible</span>
                @endif
            </p>
        </div>
    </div>
</div><br><br><br>
@endsection
