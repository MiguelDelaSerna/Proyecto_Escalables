@extends('layouts.app')

@section('title', 'Dashboard Cliente')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Videojuegos Disponibles</h1><br>

    <div class="row">
        <!-- Menú de navegación a la izquierda -->
        <div class="col-md-3">
            <div class="d-flex flex-column align-items-start gap-3">
                <a href="{{ route('cliente.historial') }}" class="btn btn-primary w-100">📋 Mi Historial de Rentas</a>
            </div>
        </div>

        <!-- Contenido principal: Videojuegos disponibles -->
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($videojuegos as $videojuego)
                <div class="col">
                    <div class="card h-100 text-white bg-dark">
                        <img src="{{ asset('images/videojuegos/' . $videojuego->imagen_portada) }}" class="card-img-top" alt="{{ $videojuego->titulo }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $videojuego->titulo }}</h5>
                            <p class="card-text">
                                <strong>Disponibilidad:</strong> 
                                @if($videojuego->disponibilidad)
                                    <span class="text-status text-success">Disponible</span>
                                @else
                                    <span class="text-status text-danger">No Disponible</span>
                                @endif
                            </p>
                            <a href="{{ route('cliente.videojuego.show', $videojuego->id) }}" class="btn btn-primary w-100">Más Información</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
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
        min-height: 400px;  /* Ajusta la altura mínima de la tarjeta */
        display: flex;
        flex-direction: column;
    }

    .card-img-top {
        max-height: 250px;  /* Ajusta el valor según el tamaño deseado */
        object-fit: cover;  /* Mantiene la proporción de la imagen */
    }

    .card-body {
        flex-grow: 1;  /* Hace que el contenido crezca para llenar el espacio disponible */
        padding: 20px;
    }

    .card-title {
        color: #ffbf00; /* Color dorado */
        margin-bottom: 15px;
    }

    .card-text {
    color: #f8f9fa;
    margin-bottom: 15px;
    display: flex;
    align-items: center;  /* Alinea verticalmente el texto */
    }

    .card-text strong {
        margin-right: 5px; /* Ajusta el espacio entre el texto "Disponibilidad:" y el estado */
    }

    .text-status {
        display: inline-block; 
        white-space: nowrap; /* Impide que el texto se divida en varias líneas */
        width: auto; /* Ajusta automáticamente al contenido */
    }

    .text-success {
        color: #28a745;  /* Color verde para "Disponible" */
    }

    .text-danger {
        color: #dc3545;  /* Color rojo para "No Disponible" */
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
