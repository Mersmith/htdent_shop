<?php

namespace App\Http\Livewire\Frontend\ProductoSolo;

use Livewire\Component;
use App\Models\Medida;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoVariacionMedida extends Component
{
    public $producto, $medidas,  $medida_id = "", $colores = [], $color_id = 1;
    public $stockProducto = 0;
    public $cantidadCarrito = 1;
    public $opciones = ['cantidad' => null];

    public function mount()
    {
        $this->medidas = $this->producto->medidas;
        $this->opciones["imagen"] = $this->producto->imagenes->count()  ? Storage::url($this->producto->imagenes->first()->imagen_ruta) : asset('imagenes/producto/sin_foto_producto.png') ;

        $this->opciones["puntos_ganar"] = $this->producto->puntos_ganar;
        $this->opciones["puntos_tope"] = $this->producto->puntos_tope;
    }

    public function updatedMedidaId($value)
    {
        $dataMedida = Medida::find($value);
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, 1, $dataMedida->id);
        $this->opciones["color_id"] = 1;
        $this->opciones['color'] = "ninguno";
        $this->opciones['medida_id'] = $dataMedida->id;
        $this->opciones['medida'] = $dataMedida->nombre;
        $this->opciones["cantidad"] = calculandoStockProductos($this->producto->id, 1, $dataMedida->id);

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
        Cart::instance('shopping')->add(
            [
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->cantidadCarrito,
                'price' => $this->producto->precio,
                'weight' => 550,
                'options' => $this->opciones,
            ]
        );

        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, 1, $this->medida_id);

        $this->reset('cantidadCarrito');

        $this->emitTo('frontend.menu.menu-carrito', 'render');
    }

    public function render()
    {
        return view('livewire.frontend.producto-solo.agregar-carrito-variacion-medida');
    }
}
