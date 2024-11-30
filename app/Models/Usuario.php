<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'rol',
        'contador_rentas',
        'password',
    ];

    public function rentas()
    {
        return $this->hasMany(Renta::class, 'id_cliente'); // 'cliente_id' es el campo que conecta con el cliente
    }
}
