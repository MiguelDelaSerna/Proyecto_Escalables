<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RentaController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('admin.dashboard'); // Carga la vista 'resources/views/admin/dashboard.blade.php'
})->name('admin.dashboard');


// Ruta para el dashboard del cliente
Route::get('/cliente', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');
// Ruta para el historial de rentas del cliente
Route::get('/cliente/historial', [ClienteController::class, 'historial'])->name('cliente.historial');
Route::get('/videojuego/{id}', [VideojuegoController::class, 'show'])->name('cliente.videojuego.show');



Route::resource('videojuegos', VideojuegoController::class);

// Rutas para Clientes
Route::prefix('cliente')->name('cliente.')->group(function () {
    Route::resource('clientes', ClienteController::class)->except(['show']);
});

Route::resource('rentas', RentaController::class);

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

// Ruta para el dashboard del empleado
Route::get('/empleado/dashboard', [EmpleadoController::class, 'top'])->name('empleado.dashboard');

// Gestión de empleados
Route::prefix('empleado')->name('empleado.')->group(function () {
    Route::resource('empleados', EmpleadoController::class)->except(['show']);
});

// Gestionar rentas
Route::get('/empleado/rentas', [EmpleadoController::class, 'rentas'])->name('empleado.rentas');

// Ruta para ver los videojuegos registrados
Route::get('/empleado/videojuegos', [EmpleadoController::class, 'videojuegos'])->name('empleado.videojuegos');
