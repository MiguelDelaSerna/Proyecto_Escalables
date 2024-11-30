<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    public function index()
    {
        $videojuegos = Videojuego::all();
        return view('videojuegos.index', compact('videojuegos'));
    }

    public function create()
    {
        return view('videojuegos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'plataforma' => 'required|string|max:100',
            'genero' => 'required|string|max:100',
            'precio_renta' => 'required|numeric|min:0',
            'disponibilidad' => 'required|boolean',
            'imagen_portada' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen_portada')) {
            $imageName = time() . '.' . $request->imagen_portada->extension();
            $request->imagen_portada->move(public_path('images/videojuegos'), $imageName);
            $data['imagen_portada'] = $imageName; // Guardar el nombre de la imagen en la base de datos
        }

        Videojuego::create($data);

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado correctamente.');
    }

    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.edit', compact('videojuego'));
    }

    public function update(Request $request, Videojuego $videojuego)
    {
        // Validar los datos incluyendo la imagen
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'plataforma' => 'required|string|max:100',
            'genero' => 'required|string|max:100',
            'precio_renta' => 'required|numeric|min:0',
            'disponibilidad' => 'required|boolean',
            'imagen_portada' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imagen
        ]);

        $data = $request->except('imagen_portada'); // Tomar todos los datos excepto la imagen

        // Verificar si se subió una nueva imagen
        if ($request->hasFile('imagen_portada')) {
            // Generar un nombre único para la nueva imagen
            $imageName = time() . '.' . $request->imagen_portada->extension();

            // Mover la imagen a la carpeta pública
            $request->imagen_portada->move(public_path('images/videojuegos'), $imageName);

            // Guardar el nuevo nombre en el array de datos
            $data['imagen_portada'] = $imageName;

            // Eliminar la imagen anterior si existe
            if ($videojuego->imagen_portada && file_exists(public_path('images/videojuegos/' . $videojuego->imagen_portada))) {
                unlink(public_path('images/videojuegos/' . $videojuego->imagen_portada));
            }
        }

        // Actualizar el videojuego con los datos procesados
        $videojuego->update($data);

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego actualizado correctamente.');
    }


    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego eliminado correctamente.');
    }

    public function show($id)
    {
        $videojuego = Videojuego::findOrFail($id);
        return view('cliente.videojuego.show', compact('videojuego'));
    }
}
