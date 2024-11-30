<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_videojuego')->constrained('videojuegos'); // Relación con la tabla videojuegos
            $table->foreignId('id_cliente')->constrained('usuarios'); // Relación con la tabla usuarios para el cliente
            $table->date('fecha_renta');
            $table->date('fecha_devolucion')->nullable();
            $table->enum('estado', ['pendiente', 'devuelto', 'en atraso'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentas');
    }
};
