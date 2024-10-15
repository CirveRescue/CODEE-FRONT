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

        // Vehículos que están adentro (sin salida registrada)
        $vehiculosDentro = Entrada::whereNotIn('vehiculo_id', function($query) {
            $query->select('vehiculo_id')->from('salida');
        })->get();

        return view('dashboard', compact('entradasHoy', 'salidasHoy', 'totalEntradas', 'totalSalidas', 'vehiculosDentro'));
    }
}
