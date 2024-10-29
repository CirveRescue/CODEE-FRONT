<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        }


        // Si las credenciales son incorrectas
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }




    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

public function register(Request $request)
{
    // Validar los datos del formulario
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Crear el usuario
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password; // Esto usará el mutador
    $user->save();
    $user->roles()->attach($request->role);
    // Autenticar al usuario
    Auth::login($user);

    return redirect()->route('auth.register')->with('success', 'Perfil Creado Corectamente.');
}



}
