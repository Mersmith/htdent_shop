<?php

use App\Http\Controllers\Cliente\CuponesController;
use App\Http\Controllers\Cliente\OrdenController;
use App\Http\Livewire\Cliente\Orden\OrdenMostrar;
use App\Http\Livewire\Cliente\Orden\OrdenPagar;
use App\Http\Livewire\Cliente\Perfil\PaginaPerfilCliente;
use App\Http\Livewire\Cliente\Direccion\PaginaDireccionCliente;
use App\Http\Livewire\Cliente\Direccion\PaginaCrearDireccionCliente;
use App\Http\Livewire\Cliente\Direccion\PaginaEditarDireccionCliente;
use App\Http\Livewire\Cliente\Favoritos\PaginaFavoritosCliente;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'cliente/datos-personales');

Route::get('datos-personales', PaginaPerfilCliente::class)->name('perfil');

Route::get('mi-orden/{orden}/pagar', OrdenPagar::class)->name('orden.pagar');
Route::get('mis-ordenes', [OrdenController::class, 'index'])->name('orden.index');
Route::get('mi-orden/{orden}', [OrdenController::class, 'mostrar'])->name('orden.mostrar');
Route::get('orden/{orden}/compra-mercadopago', [OrdenController::class, 'comprarMercadoPago'])->name('orden.comprar.mercadopago');
Route::get('orden/{orden}/compra-paypal', [OrdenController::class, 'comprarPaypal'])->name('orden.comprar.paypal');

Route::get('mis-direcciones', PaginaDireccionCliente::class)->name('direcciones');
Route::get('crear-direccion', PaginaCrearDireccionCliente::class)->name('direcciones.crear');
Route::get('mis-direcciones/{direccionslug}/editar', PaginaEditarDireccionCliente::class)->name('direcciones.editar');

Route::get('puntos-crd', function () {
    return view('cliente.puntos.pagina-index');
})->name('puntos.crd');

Route::get('mis-cupones', [CuponesController::class, 'index'])->name('cupon.index');

Route::get('mis-favoritos', PaginaFavoritosCliente::class)->name('favoritos');

