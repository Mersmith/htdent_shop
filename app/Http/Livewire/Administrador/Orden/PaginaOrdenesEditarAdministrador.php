<?php

namespace App\Http\Livewire\Administrador\Orden;

use App\Models\Orden;
use Livewire\Component;

class PaginaOrdenesEditarAdministrador extends Component
{
    public $orden, $estado;

    public function mount(Orden $orden)
    {
        $this->orden = $orden;
        $this->estado = $this->orden->estado;
    }

    public function actualizarEstadoOrden(){
        $this->orden->estado = $this->estado;
        $this->orden->save();

        $this->emit('mensajeActualizado', "Estado actualizado.");
    }

    public function render()
    {
        return view('livewire.administrador.orden.pagina-ordenes-editar-administrador')->layout('layouts.administrador.administrador');
    }
}
