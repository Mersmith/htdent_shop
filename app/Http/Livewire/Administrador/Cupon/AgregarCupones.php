<?php

namespace App\Http\Livewire\Administrador\Cupon;

use Livewire\Component;
use App\Models\Cupon;

class AgregarCupones extends Component
{
    public $codigo, $tipo = "fijo", $descuento, $carrito_monto, $fecha_expiracion;

    public function crearCupon()
    {
        $this->validate([
            'codigo' => 'required|unique:cupons',
            'tipo' => 'required',
            'descuento' => 'required|numeric',
            'carrito_monto' => 'required|numeric',
            'fecha_expiracion' => 'required',
        ]);

        $cupon = new Cupon();
        $cupon->codigo = $this->codigo;
        $cupon->tipo = $this->tipo;
        $cupon->descuento = $this->descuento;
        $cupon->carrito_monto = $this->carrito_monto;
        $cupon->fecha_expiracion = $this->fecha_expiracion;

        $cupon->save();
        session()->flash('message', 'Cupón creado');

        $this->emit('mensajeCreado', "Cupón creado.");

        return redirect()->route('administrador.cupones.index');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'codigo' => 'required|unique:cupons',
            'tipo' => 'required',
            'descuento' => 'required|numeric',
            'carrito_monto' => 'required|numeric',
            'fecha_expiracion' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.administrador.cupon.agregar-cupones')->layout('layouts.administrador.administrador');
    }
}
