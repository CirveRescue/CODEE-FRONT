<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'entrada';

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['vehiculo_id', 'usuario_id', 'acceso_id', 'fecha_entrada'];
}
