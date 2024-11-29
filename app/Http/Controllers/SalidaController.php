<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;

class SalidaController extends Controller
{
    public function index()
    {
        $vehiculosAfuera = Salida::with(['vehiculo', 'usuario'])->get();
        return view('VehiclesOut.index', compact('vehiculosAfuera'));
    }
}
