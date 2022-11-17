<?php

namespace App\Http\Livewire\Cliente\Direccion;

use App\Models\Direccion;
use Livewire\Component;

class PaginaDireccionCliente extends Component
{
    public $direcciones;

    public function mount()
    {
        $this->traerDirecciones();
    }

    public function traerDirecciones()
    {
        $this->direcciones = Direccion::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.cliente.direccion.pagina-direccion-cliente')->layout('layouts.cliente.cliente');
    }
}
