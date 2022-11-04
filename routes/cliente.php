<?php

use App\Http\Controllers\Cliente\OrdenController;
use App\Http\Livewire\Cliente\Orden\OrdenMostrar;
use App\Http\Livewire\Cliente\Orden\OrdenPagar;
use App\Http\Livewire\Cliente\Perfil\PaginaPerfilCliente;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'cliente/perfil');

Route::get('perfil', PaginaPerfilCliente::class)->name('perfil');

Route::get('orden/{orden}/pagar', OrdenPagar::class)->name('orden.pagar');
Route::get('ordenes', [OrdenController::class, 'index'])->name('orden.index');
Route::get('orden/{orden}', [OrdenController::class, 'mostrar'])->name('orden.mostrar');
Route::get('orden/{orden}/compra', [OrdenController::class, 'compra'])->name('orden.compra');
