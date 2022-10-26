<?php

namespace App\Http\Livewire\Frontend\Menu;

use Livewire\Component;

class MenuCarrito extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.frontend.menu.menu-carrito');
    }
}
