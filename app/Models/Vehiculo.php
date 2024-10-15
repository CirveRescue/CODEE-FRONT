<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'Vehiculo';

    // Campos que pueden ser rellenados masivamente
    protected $fillable = ['Placa', 'Modelo', 'Color', 'Año', 'ID_Usuario'];

    // Relación inversa de muchos a uno con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario', 'ID_Usuario');
    }
}
