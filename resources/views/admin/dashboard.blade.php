@extends('layouts.app')

@section('title', 'Dashboard Administrador')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-light mb-4">Bienvenido, Administrador</h1>
    
    <div class="row">
        <!-- Menú de navegación a la izquierda -->
        <div class="col-md-3">
            <div class="card shadow-lg bg-dark text-light mb-4">
                <div class="card-body">
                    <h5 class="card-title text-center">Menú</h5>
                    <div class="d-flex flex-column gap-3 mt-3">
                        <a href="{{ route('videojuegos.index') }}" class="btn btn-outline-light w-100">🎮 Gestionar Videojuegos</a>
                        <a href="{{ route('empleado.empleados.index') }}" class="btn btn-outline-light w-100">👥 Gestionar Empleados</a>
                        <a href="{{ route('cliente.clientes.index') }}" class="btn btn-outline-light w-100">🧑‍🤝‍🧑 Gestionar Clientes</a>
                        <a href="{{ route('rentas.index') }}" class="btn btn-outline-light w-100">📋 Gestionar Rentas</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-9">
            <!-- Juegos más rentados -->
            <div class="mb-4">
                <div class="card shadow-lg bg-dark text-light h-100">
                    <div class="card-header text-center">
                        <h5>🎮 Top 10 Juegos Más Rentados</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($topJuegos as $videojuego)
                                <li class="list-group-item bg-secondary text-light">
                                    <strong>{{ $videojuego->titulo }}</strong>
                                    <br>Plataforma: {{ $videojuego->plataforma }}
                                    <br>Número de Rentas: {{ $videojuego->contador_rentas }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Clientes con más rentas -->
            <div>
                <div class="card shadow-lg bg-dark text-light h-100">
                    <div class="card-header text-center">
                        <h5>🧑‍🤝‍🧑 Top 10 Clientes con Más Rentas</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($topClientes as $cliente)
                                <li class="list-group-item bg-secondary text-light">
                                    <strong>{{ $cliente->nombre }}</strong>
                                    <br>Número de Rentas: {{ $cliente->contador_rentas }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br><br><br>
@endsection

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #1b1f24, #2b2f35);
        font-family: 'Roboto', sans-serif;
    }

    h1, h5 {
        font-weight: bold;
        color: #ffbf00; /* Un tono dorado llamativo */
    }

    .card {
        border-radius: 10px;
    }

    .btn-outline-light {
        border: 2px solid #ffbf00;
        color: #ffbf00;
        font-weight: bold;
    }

    .btn-outline-light:hover {
        background-color: #ffbf00;
        color: #1b1f24;
    }

    .list-group-item {
        border: none;
    }

    .list-group-item + .list-group-item {
        margin-top: 10px;
    }
</style>
@endpush
