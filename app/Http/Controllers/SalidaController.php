<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salida;

class SalidaController extends Controller
{
    public function index()
    {
        $vehiculosAfuera = Salida::all();
        return view('VehiclesOut.index', compact('vehiculosAfuera'));
    }
}
