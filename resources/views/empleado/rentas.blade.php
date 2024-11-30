@extends('layouts.app')

@section('title', 'Gestionar Rentas')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Rentas Registradas</h1>

        <div class="mb-3">
            <a href="{{ route('rentas.create') }}" class="btn btn-success">Registrar Nueva Renta</a>
        </div><br>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Videojuego</th>
                    <th>Cliente</th>
                    <th>Fecha de Renta</th>
                    <th>Fecha de Devolución</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentas as $renta)
                    <tr>
                        <td>{{ $renta->videojuego->titulo }}</td>
                        <td>{{ $renta->cliente->nombre }}</td>
                        <td>{{ $renta->fecha_renta }}</td>
                        <td>{{ $renta->fecha_devolucion }}</td>
                        <td>
                            @if($renta->estado == 'pendiente')
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @elseif($renta->estado == 'devuelto')
                                <span class="badge bg-success">Devuelto</span>
                            @else
                                <span class="badge bg-danger">En Atraso</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('rentas.edit', $renta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('rentas.destroy', $renta->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta renta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
