<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo rol.
     */
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        // Crear el rol
        Role::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }
     // Mostrar todos los roles
     public function index()
     {
         $roles = Role::all();
         return view('roles.index', compact('roles'));
     }

     // Mostrar el formulario para editar un rol
     public function edit(Role $role)
     {
         return view('roles.edit', compact('role'));
     }

     // Actualizar el rol en la base de datos
     public function update(Request $request, Role $role)
     {
         $request->validate([
             'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
             'description' => 'nullable|string|max:255',
         ]);

         $role->update($request->all());

         return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
     }

     // Eliminar un rol
     public function destroy(Role $role)
     {
         $role->delete();
         return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
     }
}
