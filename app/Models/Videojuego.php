<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'plataforma',
        'genero',
        'precio_renta',
        'disponibilidad',
        'imagen_portada',
        'contador_rentas',
    ];
    
}
