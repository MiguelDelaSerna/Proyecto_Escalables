<!-- resources/views/cliente/historial.blade.php -->
@extends('layouts.app')

@section('title', 'Mi Historial de Rentas')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Mi Historial de Rentas</h1>

    @if($rentas->isEmpty())
        <p>No has realizado ninguna renta aún.</p>
    @else
        <div class="list-group">
            @foreach($rentas as $renta)
                <div class="list-group-item">
                    <strong>{{ $renta->videojuego->titulo }}</strong><br>
                    Fecha de Renta: {{ $renta->fecha_renta }}<br>
                    Fecha de Devolución: {{ $renta->fecha_devolucion }}<br>
                    Estado: 
                    @if($renta->estado === 'devuelto')
                        <span class="text-success">Devuelto</span>
                    @else
                        <span class="text-warning">Pendiente</span>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div><br><br><br>
@endsection
