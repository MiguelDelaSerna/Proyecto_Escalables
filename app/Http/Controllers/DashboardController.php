<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Obtener los 10 juegos más rentados
        $topJuegos = Videojuego::orderBy('contador_rentas', 'desc')->take(10)->get();

        // Obtener los 10 clientes con más rentas
        $topClientes = Usuario::where('rol', 'cliente')->orderBy('contador_rentas', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('topJuegos', 'topClientes'));
    }   
}