@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Clientes</h1>
        <div class="mb-3">
            <a href="{{ route('cliente.clientes.create') }}" class="btn btn-success">Agregar Cliente</a>
        </div><br>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <a href="{{ route('cliente.clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('cliente.clientes.destroy', $cliente) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay clientes registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div><br><br><br>
@endsection
