<?php

namespace App\Http\Livewire\Administrador\Orden;

use App\Models\Orden;
use Livewire\Component;
use Livewire\WithPagination;

class PaginaOrdenesAdministrador extends Component
{
    use WithPagination;
    public $buscarOrden;
    protected $paginate = 10;

    public $estado;
    protected $queryString = ['estado'];
    //request('estado')

    /*public function updatingBuscarOrden()
    {
        $this->resetPage();
    }*/

    public function render()
    {
        $ordenes = Orden::query()->orderBy('updated_at', 'desc');

        if ($this->estado) {
            $ordenes->where('estado', $this->estado);
            if ($this->buscarOrden) {
                $ordenes->where('total', 'like', '%' . $this->buscarOrden . '%');
            }
        } else {
            if ($this->buscarOrden) {
                $ordenes->where('total', 'like', '%' . $this->buscarOrden . '%');
            }
        }

        $ordenes = $ordenes->paginate(4)->withQueryString();

        $pendiente = Orden::where('estado', 1)->count();
        $recibido = Orden::where('estado', 2)->count();
        $enviado = Orden::where('estado', 3)->count();
        $entregado = Orden::where('estado', 4)->count();
        $anulado = Orden::where('estado', 5)->count();
        $todos = $pendiente + $recibido + $enviado + $entregado + $anulado;

        return view('livewire.administrador.orden.pagina-ordenes-administrador', compact('ordenes', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado', 'todos'))->layout('layouts.administrador.administrador');
    }
}
