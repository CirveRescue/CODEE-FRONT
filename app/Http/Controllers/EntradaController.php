<?php

namespace App\Http\Controllers;
use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $vehiculosDentro = Entrada::with(['vehiculo', 'usuario'])->get();

    return view('VehiclesIn.index', compact('vehiculosDentro'));
    }
}
