<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Salida;

class DashboardController extends Controller
{
    public function index()
    {
        $entradasHoy = Entrada::whereDate('fecha_entrada', now()->format('Y-m-d'))->count();
        $salidasHoy = Salida::whereDate('fecha_salida', now()->format('Y-m-d'))->count();
        $totalEntradas = Entrada::count();
        $totalSalidas = Salida::count();
        $vehiculosDentro = Entrada::with(['vehiculo', 'usuario'])->get();


        return view('dashboard', compact('entradasHoy', 'salidasHoy', 'totalEntradas', 'totalSalidas', 'vehiculosDentro'));
    }
}

