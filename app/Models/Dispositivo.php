<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;

    protected $table = 'dispositivo';
    protected $primaryKey = 'ID_Dispositivo';
    protected $fillable = [
        'Tipo_Dispositivo',
        'Ubicacion',
        'Estado_Dispositivo',
        'IP_Camara',
        'created_at',
        'updated_at',
    ];
}
