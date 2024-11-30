<?php

namespace App\Http\Controllers;

use App\Models\Renta;
use App\Models\Videojuego;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    public function index()
    {
        // Obtener todas las rentas
        $rentas = Renta::with(['videojuego', 'cliente'])->get();
        return view('renta.index', compact('rentas'));
    }

    public function create()
    {
        // Obtener todos los videojuegos y clientes
        $videojuegos = Videojuego::all();
        $clientes = Usuario::where('rol', 'cliente')->get(); // Solo los clientes
        return view('renta.create', compact('videojuegos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_videojuego' => 'required|exists:videojuegos,id',
            'id_cliente' => 'required|exists:usuarios,id',
            'fecha_renta' => 'required|date',
            'estado' => 'required|in:pendiente,devuelto,en atraso',
            'fecha_devolucion' => 'nullable|date', // Validación para la fecha_devolucion
        ]);

        // Verificar la disponibilidad del videojuego
        $videojuego = Videojuego::find($request->id_videojuego);
        if ($videojuego->disponibilidad == 0) {
            return redirect()->back()->withErrors(['id_videojuego' => 'El videojuego seleccionado no está disponible para renta.']);
        }

        // Crear la renta
        $renta = Renta::create([
            'id_videojuego' => $request->id_videojuego,
            'id_cliente' => $request->id_cliente,
            'fecha_renta' => $request->fecha_renta,
            'estado' => $request->estado,
            'fecha_devolucion' => $request->fecha_devolucion, // Guardar la fecha_devolucion
        ]);

        // Cambiar la disponibilidad del videojuego según el estado de la renta
        if (in_array($request->estado, ['pendiente', 'en atraso'])) {
            $videojuego->update(['disponibilidad' => 0]); // No disponible
        } elseif ($request->estado === 'devuelto') {
            $videojuego->update(['disponibilidad' => 1]); // Disponible
        }

        // Incrementar el contador de rentas del cliente
        $cliente = Usuario::find($request->id_cliente);
        $cliente->increment('contador_rentas');

        // Incrementar el contador de rentas
        $videojuego->increment('contador_rentas');

        return redirect()->route('rentas.index')->with('success', 'Renta registrada correctamente.');
    }




    public function edit(Renta $renta)
    {
        // Obtener los videojuegos y clientes para poder editar la renta
        $videojuegos = Videojuego::all();
        $clientes = Usuario::where('rol', 'cliente')->get();
        return view('renta.edit', compact('renta', 'videojuegos', 'clientes'));
    }

    public function update(Request $request, Renta $renta)
    {
        $request->validate([
            'id_videojuego' => 'required|exists:videojuegos,id',
            'id_cliente' => 'required|exists:usuarios,id',
            'fecha_renta' => 'required|date',
            'estado' => 'required|in:pendiente,devuelto,en atraso',
            'fecha_devolucion' => 'nullable|date', // Validación para la fecha_devolucion
        ]);

        $renta->update([
            'id_videojuego' => $request->id_videojuego,
            'id_cliente' => $request->id_cliente,
            'fecha_renta' => $request->fecha_renta,
            'estado' => $request->estado,
            'fecha_devolucion' => $request->fecha_devolucion, // Actualizar la fecha_devolucion
        ]);

        // Cambiar la disponibilidad del videojuego según el estado de la renta
        if (in_array($renta->estado, ['pendiente', 'en atraso'])) {
            $renta->videojuego->update(['disponibilidad' => 0]);
        } elseif ($renta->estado === 'devuelto') {
            $renta->videojuego->update(['disponibilidad' => 1]);
        }

        return redirect()->route('rentas.index')->with('success', 'Renta actualizada correctamente.');
    }


    public function destroy(Renta $renta)
    {
        $renta->delete();
        return redirect()->route('rentas.index')->with('success', 'Renta eliminada correctamente.');
    }
}
