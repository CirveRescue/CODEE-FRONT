<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlacasController extends Controller
{
    public function manualEntry(Request $request)
{
    $request->validate([
        'placa' => 'required|string|max:10',
    ]);
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->timeout(120)->post('http://127.0.0.1:8000/api/manual-entry', [
        'placa' => $request->placa,
    ]);


    if ($response->successful()) {
        return redirect()->back()->with('success', 'El vehículo con placa ' . $request->placa . ' fue autorizado.');
    } else {
        return redirect()->back()->with('error', 'Hubo un problema al autorizar la placa.');
    }
}


}
