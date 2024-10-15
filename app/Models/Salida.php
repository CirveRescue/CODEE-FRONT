<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'salida';

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['vehiculo_id', 'usuario_id', 'acceso_id', 'fecha_salida'];
}
