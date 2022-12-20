<?php

namespace App\Http\Livewire\Cliente\Favoritos;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class PaginaFavoritosCliente extends Component
{
    public function eliminarFavorito($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);

        $this->emitTo('frontend.menu.menu-favoritos', 'render');
    }

    public function render()
    {
        return view('livewire.cliente.favoritos.pagina-favoritos-cliente')->layout('layouts.cliente.cliente');
    }
}
