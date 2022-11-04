<?php

namespace App\Http\Livewire\Administrador\Cupon;

use Livewire\Component;
use App\Models\Cupon;

class MostrarCupones extends Component
{
    //Los detectores de eventos
    protected $listeners = ['eliminarCupon'];

    public function eliminarCupon($cuponId)
    {
        $cupon = Cupon::find($cuponId);
        $cupon->delete();
        session()->flash('message', 'Cupon eliminado');
    }

    public function render()
    {
        $cupones = Cupon::all();
        return view('livewire.administrador.cupon.mostrar-cupones', ['cupones' => $cupones])->layout('layouts.administrador.administrador');
    }
}
