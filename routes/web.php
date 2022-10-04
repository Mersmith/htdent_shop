<?php

use App\Http\Livewire\Administrador\PaginaPerfilAdministrador;
use App\Http\Livewire\Cliente\PaginaPerfilCliente;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('administrador/perfil', PaginaPerfilAdministrador::class)->name('administrador.perfil');
Route::get('cliente/perfil', PaginaPerfilCliente::class)->name('cliente.perfil');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
