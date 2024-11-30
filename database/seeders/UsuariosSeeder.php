<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'nombre' => 'Admin Principal',
                'email' => 'admin1@example.com',
                'telefono' => '1234567890',
                'rol' => 'administrador',
                'password' => Hash::make('admin123'),
            ],
            [
                'nombre' => 'Admin Secundario',
                'email' => 'admin2@example.com',
                'telefono' => '1234567891',
                'rol' => 'administrador',
                'password' => Hash::make('admin456'),
            ],
            [
                'nombre' => 'Empleado 1',
                'email' => 'empleado1@example.com',
                'telefono' => '0987654321',
                'rol' => 'empleado',
                'password' => Hash::make('empleado123'),
            ],
            [
                'nombre' => 'Empleado 2',
                'email' => 'empleado2@example.com',
                'telefono' => '0987654322',
                'rol' => 'empleado',
                'password' => Hash::make('empleado456'),
            ],
            [
                'nombre' => 'Cliente Uno',
                'email' => 'cliente1@example.com',
                'telefono' => '5551112222',
                'rol' => 'cliente',
                'password' => Hash::make('cliente123'),
            ],
            [
                'nombre' => 'Cliente Dos',
                'email' => 'cliente2@example.com',
                'telefono' => '5553334444',
                'rol' => 'cliente',
                'password' => Hash::make('cliente456'),
            ],
        ]);
    }
}

