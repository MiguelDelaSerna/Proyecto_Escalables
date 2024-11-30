@extends('layouts.app')

@section('title', 'Lista de Empleados')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de Empleados</h1>
        
        <!-- Botón para agregar empleado -->
        <div class="mb-3">
            <a href="{{ route('empleado.empleados.create') }}" class="btn btn-success">Agregar Empleado</a>
        </div><br>

        <!-- Tabla de empleados -->
        <div class="table-responsive">
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
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td class="text-center">
                                <a href="{{ route('empleado.empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                <form action="{{ route('empleado.empleados.destroy', $empleado->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><br><br>
@endsection
