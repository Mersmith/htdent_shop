<?php

namespace App\Http\Livewire\Cliente\Direccion;

use App\Models\Direccion;
use Livewire\Component;

class PaginaDireccionCliente extends Component
{
    public $direcciones;

    protected $listeners = ['eliminarDireccion'];

    public function mount()
    {
        $this->traerDirecciones();
    }

    public function traerDirecciones()
    {
        //$this->direcciones = Direccion::where('user_id', auth()->user()->id)->orderBy('posicion', 'asc')->get();
        $this->direcciones = Direccion::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
    }

    public function establecerPrincipal(Direccion $direccion)
    {
        if ($direccion->posicion == 0) {
            $direccion->posicion = 1;
        } else {
            $direccion->posicion = 0;
        }
        $direccion->save();
        $this->traerDirecciones();
        $this->emit('mensajeActualizado', "Dirección actualizado");
    }

    public function eliminarDireccion(Direccion $direccion)
    {
        $direccion->delete();
        $this->traerDirecciones();
    }

    public function render()
    {
        return view('livewire.cliente.direccion.pagina-direccion-cliente')->layout('layouts.cliente.cliente');
    }
}
