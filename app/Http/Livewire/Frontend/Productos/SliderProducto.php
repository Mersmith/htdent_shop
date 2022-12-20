<?php

namespace App\Http\Livewire\Frontend\Productos;

use App\Models\Producto;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class SliderProducto extends Component
{
    public $productos;
    public $opciones = ['color_id' => null, 'medida_id' => null, 'cantidad' => null];

    public function agregarFavorito($producto)
    {
        $this->opciones["imagen"] = $producto['imagenes']  ? Storage::url($producto['imagenes'][0]['imagen_ruta']) : asset('imagenes/producto/sin_foto_producto.png');

        Cart::instance('wishlist')->add([
            'id' => $producto['id'],
            'name' => $producto['nombre'],
            'qty' => 1,
            'price' => $producto['precio'],
            'weight' => 550,
            'options' => $this->opciones,
        ]);

        $this->productos = $this->productos->fresh();
        $this->emitTo('frontend.menu.menu-favoritos', 'render');
    }

    public function eliminarFavorito($productoId)
    {
        foreach (Cart::instance('wishlist')->content() as $witen) {
            if ($witen->id == $productoId) {
                Cart::instance('wishlist')->remove($witen->rowId);
                $this->productos = $this->productos->fresh();
                $this->emitTo('frontend.menu.menu-favoritos', 'render');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.productos.slider-producto');
    }
}
