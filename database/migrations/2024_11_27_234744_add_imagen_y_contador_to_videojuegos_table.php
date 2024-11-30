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
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->string('imagen_portada')->nullable(); // Ruta de la imagen
            $table->unsignedBigInteger('contador_rentas')->default(0); // Contador de rentas
        });
    }

    public function down()
    {
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->dropColumn(['imagen_portada', 'contador_rentas']);
        });
    }
};
