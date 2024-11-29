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
    
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}


