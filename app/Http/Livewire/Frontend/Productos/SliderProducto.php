<?php

namespace App\Http\Livewire\Frontend\Productos;

use App\Models\Producto;
use Livewire\Component;

class SliderProducto extends Component
{
    public $slider1 = "1"; 
    public $productos = [];

    public function loadProductos()
    {
        $this->productos = Producto::limit(10)->get();

        $this->emit('glider', $this->slider1);
    }

    public function render()
    {
        return view('livewire.frontend.productos.slider-producto');
    }
}
