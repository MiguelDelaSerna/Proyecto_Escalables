@extends('layouts.app')

@section('title', 'Lista de Videojuegos')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Videojuegos</h1>

        <div class="mb-3">
            <a href="{{ route('videojuegos.create') }}" class="btn btn-success">Agregar Videojuego</a>
        </div><br>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Portada</th>
                    <th>Plataforma</th>
                    <th>Género</th>
                    <th>Precio de Renta</th>
                    <th>Disponibilidad</th>
                    <th>Veces Rentado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videojuegos as $videojuego)
                    <tr>
                        <td>{{ $videojuego->titulo }}</td>
                        <td>
                            @if ($videojuego->imagen_portada)
                                <img src="{{ asset('storage/' . $videojuego->imagen_portada) }}" alt="Imagen de Portada" style="max-width: 100px;">
                            @else
                                Sin Imagen
                            @endif
                        </td>
                        <td>{{ $videojuego->plataforma }}</td>
                        <td>{{ $videojuego->genero }}</td>
                        <td>${{ number_format($videojuego->precio_renta, 2) }}</td>
                        <td>
                            <span class="badge {{ $videojuego->disponibilidad ? 'bg-success' : 'bg-danger' }}">
                                {{ $videojuego->disponibilidad ? 'Disponible' : 'No disponible' }}
                            </span>
                        </td>
                        <td>{{ $videojuego->contador_rentas }}</td>
                        <td class="text-center">
                            <a href="{{ route('videojuegos.edit', $videojuego) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><br><br>
@endsection
