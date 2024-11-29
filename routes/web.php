<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\PlacasController;


// Rutas de inicio de sesión
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');



// Rutas protegidas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/start-camera', [ApiController::class, 'getData']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Rutas de registro
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Muestra el formulario de registro
    Route::post('register', [AuthController::class, 'register'])->name('auth.register'); // Maneja el envío del formulario de registro
    //Rutas para tabla de usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit'); // Ruta para editar
    Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update'); // Ruta para actualizar
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); // Ruta para eliminar
    //Creacion de roles
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index'); // Mostrar los roles
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit'); // Editar rol
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update'); // Actualizar rol
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy'); // Eliminar rol
    //rutas para las entradas
    Route::get('/Entradas',[EntradaController::class, 'index'])->name('VehiclesIn.index');
    Route::get('/Salidas',[SalidaController::class, 'index'])->name('VehiclesOut.index');

    // Rutas dispositivos
    Route::get('/dispositivos/create', [DispositivoController::class, 'create'])->name('dispositivos.create');
    Route::post('/dispositivos', [DispositivoController::class, 'store'])->name('dispositivos.store');
    Route::get('/dispositivos/index', [DispositivoController::class, 'index'])->name('dispositivos.index');
    Route::get('/dispositivos/edit/{dispositivo}', [DispositivoController::class, 'edit'])->name('dispositivos.edit');
    Route::put('/dispositivos/{dispositivo}', [DispositivoController::class, 'update'])->name('dispositivos.update');
    Route::delete('/dispositivos/{dispositivo}', [DispositivoController::class, 'destroy'])->name('dispositivos.destroy');

    //ruta placa manual
    Route::post('/placas/manual-entry', [PlacasController::class, 'manualEntry'])->name('placas.manual-entry');


});

// Redirigir a la ruta de inicio si el usuario está autenticado
Route::get('/', function () {
    return redirect()->route('login');
});
