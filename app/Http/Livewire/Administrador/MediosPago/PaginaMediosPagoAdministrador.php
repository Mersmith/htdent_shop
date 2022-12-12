<?php

namespace App\Http\Livewire\Administrador\MediosPago;

use Livewire\Component;

class PaginaMediosPagoAdministrador extends Component
{
    public function render()
    {
        return view('livewire.administrador.medios-pago.pagina-medios-pago-administrador')->layout('layouts.administrador.administrador');
    }
}
