<?php

namespace App\Http\Livewire\Administrador\Departamento;

use App\Models\Distrito;
use App\Models\Provincia;
use Livewire\Component;

class ProvinciaComponente extends Component
{
    protected $listeners = ['eliminarDistrito'];

    public $provincia, $distritos, $distrito;

    public $crearFormulario = [
        'nombre' => '',
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => '',
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre',
    ];

    public function mount(Provincia $provincia)
    {
        $this->provincia = $provincia;
        
        $this->traerDistritos();
    }
    
    public function traerDistritos()
    {
        $this->distritos = Distrito::where('provincia_id', $this->provincia->id)->get();
    }

    public function crearDistrito()
    {
        $this->validate([
            "crearFormulario.nombre" => 'required',
        ]);

        $this->provincia->distritos()->create($this->crearFormulario);

        $this->reset('crearFormulario');

        $this->traerDistritos();

        $this->emit('guardadoMensaje');
    }

    public function editarModalDistrito(Distrito $distrito)
    {
        $this->distrito = $distrito;
        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['nombre'] = $distrito->nombre;
    }

    public function actualizarDistrito()
    {
        $this->distrito->nombre = $this->editarFormulario['nombre'];
        $this->distrito->save();

        $this->reset('editarFormulario');
        $this->traerDistritos();
    }

    public function eliminarDistrito(Distrito $distrito)
    {
        $distrito->delete();
        $this->traerDistritos();
    }

    public function render()
    {
        return view('livewire.administrador.departamento.provincia-componente')->layout('layouts.administrador.administrador');
    }
}
