<?php

namespace App\Http\Livewire\Administrador\Departamento;

use App\Models\Departamento;
use App\Models\Provincia;
use Livewire\Component;

class MostrarDepartamento extends Component
{
    protected $listeners = ['eliminarProvincia'];

    public $departamento, $provincias, $provincia;

    public $crearFormulario = [
        'nombre' => '',
        'costo' => null
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => '',
        'costo' => null
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre',
        'crearFormulario.costo' => 'costo'
    ];

    public function mount(Departamento $departamento)
    {
        $this->departamento = $departamento;
        $this->traerProvincias();
    }

    public function traerProvincias()
    {
        $this->provincias = Provincia::where('departamento_id', $this->departamento->id)->get();
    }

    public function guardarProvincia()
    {
        $this->validate([
            "crearFormulario.nombre" => 'required',
            "crearFormulario.costo" => 'required|numeric|min:1|max:100',
        ]);

        $this->departamento->provincias()->create($this->crearFormulario);

        $this->reset('crearFormulario');

        $this->traerProvincias();

        $this->emit('guardadoCiudadMensaje');
    }

    public function editarProvinciaModal(Provincia $provincia)
    {
        $this->provincia = $provincia;
        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['nombre'] = $provincia->nombre;
        $this->editarFormulario['costo'] = $provincia->costo;
    }

    public function actualizarProvincia()
    {
        $this->provincia->nombre = $this->editarFormulario['nombre'];
        $this->provincia->costo = $this->editarFormulario['costo'];
        $this->provincia->save();

        $this->reset('editarFormulario');
        $this->traerProvincias();
    }

    public function eliminarProvincia(Provincia $provincia)
    {
        $provincia->delete();
        $this->traerProvincias();
    }
    
    public function render()
    {
        return view('livewire.administrador.departamento.mostrar-departamento')->layout('layouts.administrador.administrador');
    }
}
