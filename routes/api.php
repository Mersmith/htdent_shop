<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SortSliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sort/sliders', [SortSliderController::class, 'sliders'])->name('api.sort.sliders');

Route::post('registrar', [AuthController::class, 'registrar']);
Route::post('ingresar', [AuthController::class, 'ingresar']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('usuario-perfil', [AuthController::class, 'usuarioPerfil']);
    Route::post('cerrar-sesion', [AuthController::class, 'cerrarSesion']);
});

Route::get('todos-usuarios', [AuthController::class, 'todosUsuarios']);
Route::get('usuario', [AuthController::class, 'unUsuario']);
