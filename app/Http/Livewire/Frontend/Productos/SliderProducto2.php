<?php

namespace App\Http\Livewire\Frontend\Productos;

use App\Models\Producto;
use Livewire\Component;

class SliderProducto2 extends Component
{
    public $slider2 = "2";
    public $productos = [];

    public function loadProductos()
    {
        $this->productos = Producto::limit(10)->get();

        $this->emit('glider', $this->slider2);
    }
    public function render()
    {
        return view('livewire.frontend.productos.slider-producto2');
    }
}
