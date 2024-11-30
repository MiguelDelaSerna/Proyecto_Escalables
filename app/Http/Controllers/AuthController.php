<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash; // Importar la clase Hash

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            Session::put('usuario', $usuario);

            if ($usuario->rol == 'administrador') {
                return redirect()->route('admin.dashboard');
            } elseif ($usuario->rol == 'empleado') {
                return redirect()->route('empleado.dashboard');
            } else {
                return redirect()->route('cliente.dashboard');
            }
        }

        return back()->withErrors(['login' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        Session::forget('usuario');
        return redirect()->route('login');
    }
}

