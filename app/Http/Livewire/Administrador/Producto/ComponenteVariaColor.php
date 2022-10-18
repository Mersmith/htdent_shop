<?php

namespace App\Http\Livewire\Administrador\Producto;

use App\Models\Color;
use Livewire\Component;
use App\Models\ColorProducto as Pivot;

class ComponenteVariaColor extends Component
{
    /*
        http://127.0.0.1:8000/administrador/producto/ipsam-architecto/editar id:38 
        categoria: Equipos intraorales id: 1
        subcategoria: Rayos x Portatil d: 1
        color_producto: 17-1, 18-2, 19-3, 20-4
        stocK: 11, 12, 13, 14
    */
    public $producto, $colores, $color_id, $stock, $abierto = false;

    public $pivot, $pivot_color_id, $pivot_stock;

    protected $listeners = ['eliminarPivot'];

    protected $rules = [
        'color_id' => 'required',
        'stock' => 'required|numeric'
    ];

    public function mount()
    {
        $this->colores = Color::all();
    }

    public function guardarColor()
    {
        $this->validate();
        
        $this->producto->colores()->attach([
            $this->color_id => [
                'stock' => $this->stock
            ]
        ]);
        /*$pivot = Pivot::where('color_id', $this->color_id)
            ->where('producto_id', $this->producto->id)
            ->first();

        if ($pivot) {
            $pivot->stock = $pivot->stock + $this->stock;
            $pivot->save();
        } else {
            //Atach para registrar un registro en una tabla intermedia
            $this->producto->colores()->attach([
                $this->color_id => [
                    'stock' => $this->stock
                ]
            ]);
        }*/

        $this->reset(['color_id', 'stock']);

        $this->emit('mensajeGuardarColor');

        //Consulta nuevamente a la base de datos
        $this->producto = $this->producto->fresh();
    }

    public function editarPivot(Pivot $pivot)
    {
        $this->abierto = true;
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_stock = $pivot->stock;
    }

    public function actualizarPivot()
    {
        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->stock = $this->pivot_stock;

        $this->pivot->save();

        $this->producto = $this->producto->fresh();

        $this->abierto = false;
    }

    public function eliminarPivot(Pivot $pivot)
    {
        $pivot->delete();
        $this->producto = $this->producto->fresh();
    }

    public function render()
    {
        $producto_colores = $this->producto->colores;

        return view('livewire.administrador.producto.componente-varia-color', compact('producto_colores'));
    }
}
