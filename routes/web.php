<?php

use App\Http\Controllers\Frontend\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\InicioController;
use App\Http\Controllers\Frontend\ProductoController;
use App\Http\Controllers\Frontend\ResenaController;
use App\Http\Livewire\Frontend\Carrito\CarritoCompras;
use App\Http\Livewire\Frontend\Tienda\TiendaPagina;
use Gloudemans\Shoppingcart\Facades\Cart;

require_once __DIR__ . '/fortify.php';

Route::get('/', InicioController::class)->name('inicio');

Route::get('categoria/{categoria}', [CategoriaController::class, 'mostrar'])->name('categoria.index');

Route::get('producto/{producto}', [ProductoController::class, 'mostrar'])->name('producto.index');


Route::middleware(['auth'])->group(
    function () {
        Route::get('carrito-compras', CarritoCompras::class)->name('carrito-compras');
    }
);

//Eliminar el carrito
Route::get('eliminar-carrito', function () {
    Cart::destroy();
});

Route::post('resenas/{producto}', [ResenaController::class, 'store'])->name('resenas.store');
Route::post('resenas/{producto}/{comentario}', [ResenaController::class, 'respuesta'])->name('resenas.respuesta');

Route::get('tienda', TiendaPagina::class)->name('tienda');


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
