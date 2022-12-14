<?php

use App\Http\Controllers\Crd\CrdController;
use App\Http\Controllers\Frontend\CategoriaController;
use App\Http\Controllers\Frontend\EmailContacto;
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
    //Cart::destroy();
    Cart::instance('shopping')->destroy();
});

Route::get('eliminar-favorito', function () {
    Cart::instance('wishlist')->destroy();
});

Route::get('mostrar-carrito', function () {
    /*if (Cart::count()) {
        return Cart::content();
    } else {
        return "NO hay productos en el carrito";
    }*/
    if (Cart::instance('shopping')->count()) {
        return Cart::instance('shopping')->content();
    } else {
        return "NO hay productos en el carrito";
    }
});

Route::get('mostrar-favorito', function () {
    if (Cart::instance('wishlist')->count()) {
        return Cart::instance('wishlist')->content();
    } else {
        return "NO hay productos en el favorito";
    }
});

Route::post('resenas/{producto}', [ResenaController::class, 'store'])->name('resenas.store');
Route::post('resenas/{producto}/{comentario}', [ResenaController::class, 'respuesta'])->name('resenas.respuesta');

Route::get('tienda', TiendaPagina::class)->name('tienda');

Route::post('email-contacto', [EmailContacto::class, 'enviar'])->name('email.contacto');

Route::get('crd-dni', [CrdController::class, 'buscarDni'])->name('crd.dni');
Route::get('crd-actualizar-puntos', [CrdController::class, 'actualizarPuntos'])->name('crd.actualizar');
Route::get('crd-email', [CrdController::class, 'buscarEmail'])->name('crd.email');


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
