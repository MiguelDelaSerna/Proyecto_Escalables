<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Videojuego;
use App\Models\Renta;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Usuario::where('rol', 'cliente')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'required|string|max:15',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol' => 'cliente',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('cliente.clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Usuario::findOrFail($id); // Obtener el empleado por ID

        return view('cliente.edit', compact('cliente'));  // Asegúrate de que la vista 'empleado.edit' exista
    }

    public function update(Request $request, $id)
    {
        $cliente = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $cliente->id,
            'telefono' => 'required|string|max:15',
        ]);

        $cliente->update($request->all());
        return redirect()->route('cliente.clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Usuario $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }

    // Método para mostrar el dashboard del cliente
    public function dashboard()
    {
        // Obtén los videojuegos disponibles
        $videojuegos = Videojuego::all(); // O aplica un filtro según disponibilidad
        return view('cliente.dashboard', compact('videojuegos'));
    }

    // Método para mostrar los detalles de un videojuego
    public function showVideojuego($id)
    {
        // Obtén el videojuego por su ID
        $videojuego = Videojuego::findOrFail($id);
        return view('cliente.videojuego_detalles', compact('videojuego'));
    }

    public function historial()
    {
        // Obtener el id del usuario actual desde la sesión
        $usuarioId = session('usuario')->id;

        // Obtener las rentas del cliente actual
        $rentas = Renta::where('id_cliente', $usuarioId)->get();  // Usa Renta o Rentas según corresponda

        // Pasar las rentas a la vista
        return view('cliente.historial', compact('rentas'));
    }
}