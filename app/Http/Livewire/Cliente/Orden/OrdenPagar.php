<?php

namespace App\Http\Livewire\Cliente\Orden;

use Livewire\Component;
use App\Models\Orden;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrdenPagar extends Component
{
    use AuthorizesRequests;

    public $orden;

    protected $listeners = ['pagarOrden'];

    public function mount(Orden $orden){
        $this->orden = $orden;
    }

    public function pagarOrden(){
        $this->orden->estado = 2;
        $this->orden->save();

        return redirect()->route('cliente.orden.mostrar', $this->orden);
    }

    public function render()
    {
        $envio = json_decode($this->orden->envio);
        $productosCarrito = json_decode($this->orden->contenido);
        return view('livewire.cliente.orden.orden-pagar', compact('productosCarrito', 'envio'))->layout('layouts.frontend.frontend');
    }
}
