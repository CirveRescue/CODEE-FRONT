<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    // Mostrar formulario de creación de dispositivo
    public function create()
    {
    // Contar cuántos dispositivos del tipo "Cámara" existen
    $tipo = 'Cámara';
    $numero = Dispositivo::count() + 1;

    // Preparar el valor incremental
    $tipoDispositivoIncremental = $tipo . ' ' . $numero;

    return view('dispositivos.create', compact('tipoDispositivoIncremental'));
    }

    // Guardar un dispositivo
    public function store(Request $request)
    {
        $request->validate([
            'Tipo_Dispositivo' => 'required|string|max:255',
            'Ubicacion' => 'required|string|in:Entrada,Salida',
            'Estado_Dispositivo' => 'required|string|max:255',

        ]);

        Dispositivo::create([
            'Tipo_Dispositivo' => $request->Tipo_Dispositivo,
            'Ubicacion' => $request->Ubicacion,
            'Estado_Dispositivo' => $request->Estado_Dispositivo,
            'IP_Camara' => $request->IP_Camara,
        ]);

        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo creado correctamente.');
    }

    // Mostrar lista de dispositivos
    public function index()
    {
        $dispositivos = Dispositivo::all();
        return view('dispositivos.index', compact('dispositivos'));
    }


    public function edit($id)
    {
        // Obtener el dispositivo por su ID
        $dispositivo = Dispositivo::findOrFail($id);

        // Pasar los datos a la vista
        return view('dispositivos.edit', compact('dispositivo'));
    }


    // Actualizar un dispositivo
    public function update(Request $request, Dispositivo $dispositivo)
    {
        $request->validate([
            'Tipo_Dispositivo' => 'required|string|max:255',
            'Estado_Dispositivo' => 'required|string|max:255',

        ]);

        $dispositivo->update([
            'Tipo_Dispositivo' => $request->Tipo_Dispositivo,
            'Ubicacion' => $request->Ubicacion,
            'Estado_Dispositivo' => $request->Estado_Dispositivo,
            'IP_Camara' => $request->IP_Camara,
        ]);

        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo actualizado correctamente.');
    }
    // Eliminar un dispositivo
public function destroy(Dispositivo $dispositivo)
{
    $dispositivo->delete();

    return redirect()->route('dispositivos.index')->with('success', 'Dispositivo eliminado correctamente.');
}

}
