<?php

namespace App\Http\Livewire\Administrador\Producto;

use App\Models\Color;
use Livewire\Component;
use App\Models\ColorMedida as Pivot;

class VariaMedidaColorStock extends Component
{
    public $medida, $colores, $color_id, $stock, $abierto = false;

    public $pivot, $pivot_color_id, $pivot_stock;

    //protected $listeners = ['eliminarVariaMedidaColor'];

    protected $rules = [
        'color_id' => 'required',
        'stock' => 'required|numeric'
    ];

    protected $validationAttributes = [
        'color_id' => 'color',
        'stock' => 'stock del color',
        'pivot_stock' => 'stock del color',
    ];

    protected $messages = [
        'color_id.required' => 'El :attribute es requerido.',
        'stock.required' => 'El :attribute es requerido.',
        'pivot_stock.required' => 'El :attribute es requerido.',
    ];

    public function mount()
    {
        $this->colores = Color::all();
    }

    public function guardarPivot()
    {
        $this->validate();

        $pivot = Pivot::where('color_id', $this->color_id)
            ->where('medida_id', $this->medida->id)
            ->first();

        if ($pivot) {
            $pivot->stock = $pivot->stock + $this->stock;
            $pivot->save();
        } else {
            $this->medida->colores()->attach([
                $this->color_id => [
                    'stock' => $this->stock
                ]
            ]);
        }

        $this->reset(['stock']);

        $this->medida = $this->medida->fresh();

        $this->emit('mensajeCreado', "Stock agregado.");
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
        $this->validate([
            'pivot_color_id' => 'required',
            'pivot_stock' => 'required',
        ]);

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->stock = $this->pivot_stock;

        $this->pivot->save();

        $this->medida = $this->medida->fresh();

        $this->reset('abierto');
        $this->emit('mensajeActualizado', "Stock actualizado.");
    }

    public function eliminarVariaMedidaColor(Pivot $variaMedidaColorId)
    {
        $variaMedidaColorId->delete();
        $this->medida = $this->medida->fresh();
        $this->emit('mensajeEliminado', "Color eliminado.");
    }
    public function render()
    {
        $medida_colores = $this->medida->colores;

        return view('livewire.administrador.producto.varia-medida-color-stock', compact('medida_colores'));
    }
}
