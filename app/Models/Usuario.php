<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'Usuario';
    protected $primaryKey = 'ID_Usuario';  // Ajusta esto si tu clave primaria tiene otro nombre

    // Campos que pueden ser rellenados masivamente
    protected $fillable = ['Nombre', 'Correo', 'Telefono'];

    // Relación de uno a muchos con Vehiculo
    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'ID_Usuario', 'ID_Usuario');
    }
}
