<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;

    protected $table = 'rentas'; // Nombre de la tabla

    protected $fillable = [
        'id_videojuego',
        'id_cliente',
        'fecha_renta',
        'fecha_devolucion',
        'estado',
    ];

    // Relación con el modelo Videojuego
    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class, 'id_videojuego');
    }

    // Relación con el modelo Usuario (Cliente)
    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'id_cliente');
    }
}
