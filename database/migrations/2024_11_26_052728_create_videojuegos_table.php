<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideojuegosTable extends Migration
{
    public function up(): void
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('plataforma');
            $table->string('genero');
            $table->decimal('precio_renta', 8, 2);
            $table->boolean('disponibilidad')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videojuegos');
    }
}
