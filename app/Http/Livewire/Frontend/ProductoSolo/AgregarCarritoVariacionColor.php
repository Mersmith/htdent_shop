<?php

namespace App\Http\Livewire\Frontend\ProductoSolo;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoVariacionColor extends Component
{
    public $producto, $colores, $color_id = "";
    public $stockProducto = 0;
    public $cantidadCarrito = 1;
    public $opciones = ['medida_id' => null, 'cantidad' => null];

    //mount palabra reserveda, carga al iniciar la página
    public function mount()
    {
        $this->colores = $this->producto->colores;

        $this->opciones["imagen"] = Storage::url($this->producto->imagenes->first()->imagen_ruta);
        $this->opciones["puntos_ganar"] = $this->producto->puntos_ganar;
        $this->opciones["puntos_tope"] = $this->producto->puntos_tope;
    }

    //Palabra reservada con la variable color
    public function updatedColorId($value)
    {
        $color = $this->producto->colores->find($value);
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $color->id);
        $this->opciones["color_id"] = $color->id;
        $this->opciones["color"] = $color->nombre;
        $this->opciones["cantidad"] = calculandoStockProductos($this->producto->id, $color->id);
        $this->reset('cantidadCarrito');
    }

    public function disminuir()
    {
        $this->cantidadCarrito = $this->cantidadCarrito - 1;
    }

    public function aumentar()
    {
        $this->cantidadCarrito = $this->cantidadCarrito + 1;
    }

    public function agregarProducto()
    {
        Cart::add(
            [
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->cantidadCarrito,
                'price' => $this->producto->precio,
                'weight' => 550,
                'options' => $this->opciones,
            ]
        );
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $this->color_id);

        $this->reset('cantidadCarrito');

        $this->emitTo('frontend.menu.menu-carrito', 'render');
    }

    public function render()
    {
        return view('livewire.frontend.producto-solo.agregar-carrito-variacion-color');
    }
}
