<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar lista de empleados
    public function index()
    {
        $empleados = Usuario::where('rol', 'empleado')->get();  // Solo empleados
        return view('empleado.index', compact('empleados'));  // Asegúrate de que la vista exista
    }

    public function create()
    {
        return view('empleado.create');  // Asegúrate de que la vista exista
    }

    // Almacenar un nuevo empleado
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'nullable|string|max:15',
            'password' => 'required|string|min:6|confirmed',  // Confirmación de contraseña
        ]);

        // Creación del empleado
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol' => 'empleado',  // Establecer el rol como 'empleado'
            'password' => bcrypt($request->password),  // Encriptar la contraseña
        ]);

        return redirect()->route('empleado.empleados.index')->with('success', 'Empleado creado correctamente.');
    }

    // Mostrar formulario para editar un empleado
    public function edit($id)
    {
        $empleado = Usuario::findOrFail($id); // Obtener el empleado por ID

        return view('empleado.edit', compact('empleado'));  // Asegúrate de que la vista 'empleado.edit' exista
    }


    public function update(Request $request, $id)
    {
        $empleado = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $empleado->id,
            'telefono' => 'required|string|max:15',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleado.empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }


    // Eliminar un empleado
    public function destroy(Usuario $empleado)
    {
        $empleado->delete();  // Eliminar el empleado
        return redirect()->route('empleado.empleados.index')->with('success', 'Empleado eliminado correctamente.');
    }

    // Método para mostrar los videojuegos
    public function videojuegos()
    {
        // Obtener todos los videojuegos
        $videojuegos = Videojuego::all();

        // Pasar los videojuegos a la vista
        return view('empleado.videojuegos', compact('videojuegos'));
    }

    public function top()
    {
        $topJuegos = Videojuego::orderBy('contador_rentas', 'desc')->take(10)->get();
        $topClientes = Usuario::where('rol', 'cliente')->orderBy('contador_rentas', 'desc')->take(10)->get();

        return view('empleado.dashboard', compact('topJuegos', 'topClientes'));
    }


    public function rentas()
    {
        // Implementa la lógica para gestionar las rentas
        return view('empleado.rentas');
    }
}