<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QueriesController;
use App\Http\Middleware\CheckValueInHeader;
use App\Http\Middleware\LogRequests;
use App\Http\Middleware\UppercaseName;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'Backend working!';
});

Route::get('/backend', [BackendController::class, 'getAll'])->middleware('CheckValue:4545,pato,otroValor');

Route::get('/backend/{id?}', [BackendController::class, 'get']);

Route::post('/backend', [BackendController::class, 'create']);

Route::put('/backend/{id}', [BackendController::class, 'update']);

Route::delete('/backend/{id}', [BackendController::class, 'delete']);


Route::get('/query', [QueriesController::class, 'get']);

Route::get('/query/{id}', [QueriesController::class, 'getById']);

Route::get('/query/method/names', [QueriesController::class, 'getNames']);

Route::get('/query/method/search/{name}/{price}', [QueriesController::class, 'searchNames']);

Route::get('/query/method/searchString/{value}', [QueriesController::class, 'searchString']);

Route::post('/query/method/advancedSearch', [QueriesController::class, 'advancedSearch']);

Route::get('/query/method/join', [QueriesController::class, 'join']);

Route::get('/query/method/groupBy', [QueriesController::class, 'groupBy']);

Route::apiResource('/product', ProductController::class)->middleware([
    // CheckValueInHeader::class, UppercaseName::class
    'jwt.auth',
    LogRequests::class
]);


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('jwt.auth')->group(function () {
    Route::get('/who', [AuthController::class, 'who']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});
