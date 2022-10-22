<?php

namespace App\Http\Livewire\Administrador\Producto;

use App\Models\Medida;
use Livewire\Component;

class ComponenteVariaMedidaColor extends Component
{
    public $producto, $nombre, $abierto = false;

    public $medida, $nombre_editado;

    protected $listeners = ['eliminarMedida'];

    protected $rules = [
        'nombre' => 'required'
    ];

    public function guardarMedida()
    {
        $this->validate();

        $medida = Medida::where('producto_id', $this->producto->id)
            ->where('nombre', $this->nombre)
            ->first();

        if ($medida) {
            $this->emit('errorMedida', 'Esa Medida ya existe');
        } else {
            $this->producto->medidas()->create([
                'nombre' => $this->nombre
            ]);
        }

        $this->reset('nombre');

        $this->producto = $this->producto->fresh();
        $this->emit('mensajeCreado', "La medida fué creada.");
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

    public function eliminarMedida(Medida $medida)
    {
        $medida->delete();
        $this->producto = $this->producto->fresh();
    }

    public function render()
    {
        $medidas = $this->producto->medidas;

        return view('livewire.administrador.producto.componente-varia-medida-color', compact('medidas'));
    }
}
