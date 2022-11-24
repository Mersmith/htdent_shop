<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Orden;
use Livewire\Component;
use Livewire\WithPagination;

class PaginaOrdenesAdministrador extends Component
{
    use WithPagination;
    public $buscarOrden;
    protected $paginate = 10;

    /*public function updatingBuscarOrden()
    {
        $this->resetPage();
    }*/

    public function render()
    {
        $ordenes = Orden::query()->where('total', 'like', '%' . $this->buscarOrden . '%');

        if (request('estado')) {
            $ordenes->where('estado', request('estado'));
            //dump(request('estado'));
        }

        $ordenes = $ordenes->paginate(1)->withQueryString();


        $pendiente = Orden::where('estado', 1)->count();
        $recibido = Orden::where('estado', 2)->count();
        $enviado = Orden::where('estado', 3)->count();
        $entregado = Orden::where('estado', 4)->count();
        $anulado = Orden::where('estado', 5)->count();

        return view('livewire.administrador.pagina-ordenes-administrador', compact('ordenes', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'))->layout('layouts.administrador.administrador');
    }
}
