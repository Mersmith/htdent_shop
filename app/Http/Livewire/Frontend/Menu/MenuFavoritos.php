<?php

namespace App\Http\Livewire\Frontend\Menu;

use Livewire\Component;

class MenuFavoritos extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.frontend.menu.menu-favoritos');
    }
}
