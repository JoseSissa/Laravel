<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/suma', function () {
    return view('suma');
});

Route::post('/suma', function (Request $request) {
    $num1 = $request->input('numero1');
    $num2 = $request->input('numero2');
    $resultado = $num1 + $num2;
    return view('suma', ['res' => $resultado]);
});