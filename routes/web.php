<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/start-camera', [ApiController::class, 'getData']);

Route::get('/', [ApiController::class, 'getData']);
