@extends('layouts.app')

@section('title', 'Ver Videojuegos')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Videojuegos</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($videojuegos as $videojuego)
            <div class="col">
                <div class="card h-100 text-white bg-dark">
                    <img src="{{ asset('images/videojuegos/' . $videojuego->imagen_portada) }}" class="card-img-top" alt="{{ $videojuego->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $videojuego->titulo }}</h5>
                        <p class="card-text">
                            <strong>Plataforma:</strong> {{ $videojuego->plataforma }}<br>
                            <strong>Género:</strong> {{ $videojuego->genero }}
                        </p>
                        <a href="{{ route('cliente.videojuego.show', $videojuego->id) }}" class="btn btn-primary w-100">Más Información</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div><br><br><br><br>
@endsection

@push('styles')
<style>
    h1 {
        color: #f4c542; /* Color dorado */
    }

    .card {
        border: 1px solid #343a40;
        background-color: #2b3a42;
        min-height: 400px;
    }

    .card-img-top {
        max-height: 250px;
        object-fit: cover;
    }

    .btn-primary {
        background-color: #ffbf00;
        border: none;
    }

    .btn-primary:hover {
        background-color: #d4a500;
    }
</style>
@endpush

