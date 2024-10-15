<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Mostrar la lista de usuarios
    public function index()
    {
        // Recuperar todos los usuarios junto con sus vehículos
        $usuarios = Usuario::with('vehiculos')->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }


    // Mostrar los detalles de un usuario
    public function show($id)
    {
        $usuario = Usuario::with('vehiculos')->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    // Método para editar un usuario
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    // Método para actualizar un usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required',
            'Correo' => 'required|email',
            'Telefono' => 'nullable'
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
