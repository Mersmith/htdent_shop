<?php

namespace App\Http\Livewire\Administrador\Producto;

use App\Models\Medida;
use Livewire\Component;

class ComponenteVariaMedidaColor extends Component
{
    public $producto, $nombre, $abierto = false;

    public $medida, $nombre_editado;

    protected $listeners = ['eliminarPivotMedidaColor'];

    protected $rules = [
        'nombre' => 'required'
    ];

    protected $validationAttributes = [
        'nombre' => 'nombre de la medida',
        'nombre_editado' => 'nombre de la medida',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es requerido.',
        'nombre_editado.required' => 'El :attribute es requerido.',
    ];
    
    public function guardarMedida()
    {
        $this->validate();

        $medida = Medida::where('producto_id', $this->producto->id)
            ->where('nombre', $this->nombre)
            ->first();

        if ($medida) {
            $this->emit('mensajeError', 'Esa Medida ya existe');
        } else {
            $this->producto->medidas()->create([
                'nombre' => $this->nombre
            ]);
            $this->emit('mensajeCreado', "La medida fué creada.");
        }

        $this->reset('nombre');

        $this->producto = $this->producto->fresh();
    }

    public function editarMedida(Medida $medida)
    {
        $this->abierto = true;
        $this->medida = $medida;
        $this->nombre_editado = $medida->nombre;
    }

    public function actualizarMedida()
    {
        $this->validate([
            'nombre_editado' => 'required'
        ]);

        $this->medida->nombre = $this->nombre_editado;
        $this->medida->save();

        $this->producto = $this->producto->fresh();

        $this->abierto = false;
        $this->emit('mensajeEditado', "La medida fué editada.");
    }

    public function eliminarPivotMedidaColor(Medida $medidaColorPivotId)
    {
        $medidaColorPivotId->delete();
        $this->producto = $this->producto->fresh();
    }

    public function render()
    {
        $medidas = $this->producto->medidas;

        return view('livewire.administrador.producto.componente-varia-medida-color', compact('medidas'));
    }
}
