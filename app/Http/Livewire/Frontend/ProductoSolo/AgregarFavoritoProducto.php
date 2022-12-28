<?php

namespace App\Http\Livewire\Frontend\ProductoSolo;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarFavoritoProducto extends Component
{
    public $producto;
    public $opciones = ['color_id' => null, 'medida_id' => null, 'cantidad' => null];

    public function agregarFavorito()
    {
        $this->opciones["imagen"] = $this->producto->imagenes->count()  ? Storage::url($this->producto->imagenes->first()->imagen_ruta) : asset('imagenes/producto/sin_foto_producto.png');
        $this->opciones["puntos_ganar"] = $this->producto->puntos_ganar;
        $this->opciones["puntos_tope"] = $this->producto->puntos_tope;
        $this->opciones["cantidad"] = $this->producto->stock_total;

        Cart::instance('wishlist')->add([
            'id' => $this->producto->id,
            'name' => $this->producto->nombre,
            'qty' => 1,
            'price' => $this->producto->precio,
            'weight' => 550,
            'options' => $this->opciones,
        ]);

        $this->emitTo('frontend.menu.menu-favoritos', 'render');
    }

    public function eliminarFavorito($productoId)
    {
        foreach (Cart::instance('wishlist')->content() as $witen) {
            if ($witen->id == $productoId) {
                Cart::instance('wishlist')->remove($witen->rowId);
                $this->emitTo('frontend.menu.menu-favoritos', 'render');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.producto-solo.agregar-favorito-producto');
    }
}
