<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Administrador;
use Livewire\Component;
use Livewire\WithPagination;

class PaginaAdministradorAdministrador extends Component
{
    use WithPagination;

    public $buscar;

    //Actualizar la variable Buscar y resetea la paginación.
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function render()
    {
        $administradores = Administrador::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orWhere('correo', 'LIKE', '%' . $this->buscar . '%')
            ->paginate(2);
        return view('livewire.administrador.pagina-administrador-administrador', compact('administradores'));
    }
}
