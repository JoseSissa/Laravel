<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

// Render a view
// Route::get('/suma', function () {
//     return view('suma');
// });

// Render a view with controller
Route::get('/suma', [SumaController::class, 'index']);
Route::post('/suma', [SumaController::class, 'suma']);
Route::get('/products', [ProductoController::class, 'index']);