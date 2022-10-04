<?php

use App\Http\Controllers\Administrador\PermisoController;
use App\Http\Controllers\Administrador\RolController;
use App\Http\Livewire\Administrador\PaginaPerfilAdministrador;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'administrador/perfil');

Route::get('perfil', PaginaPerfilAdministrador::class)->name('perfil');

Route::controller(RolController::class)->group(function () {
    Route::get('rol', 'index')->name('rol.index');
    Route::get('rol/crear', 'create')->name('rol.crear');
    Route::post('rol/crear', 'store')->name('rol.store');
    Route::get('rol/{rol}/editar', 'edit')->name('rol.editar');
    Route::put('rol/{rol}/editar', 'update')->name('rol.update');
    Route::delete('rol/{rol}', 'destroy')->name('rol.eliminar');
});

Route::controller(PermisoController::class)->group(function () {
    Route::get('permiso', 'index')->name('permiso.index');
    Route::get('permiso/crear', 'create')->name('permiso.crear');
    Route::post('permiso/crear', 'store')->name('permiso.store');
    Route::get('permiso/{permiso}/editar', 'edit')->name('permiso.editar');
    Route::put('permiso/{permiso}/editar', 'update')->name('permiso.update');
    Route::delete('permiso/{permiso}', 'destroy')->name('permiso.eliminar');
});
