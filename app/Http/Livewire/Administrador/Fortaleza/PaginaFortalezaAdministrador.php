<?php

namespace App\Http\Livewire\Administrador\Fortaleza;

use Livewire\Component;
use App\Models\Fortaleza;

class PaginaFortalezaAdministrador extends Component
{
    public $fortalezas, $fortaleza;

    protected $listeners = ['eliminarFortaleza'];

    public $crearFormulario = [
        'icono' => null,
        'titulo' => null,
        'descripcion' => null,
    ];

    public $editarFormulario = [
        'abierto' => false,
        'icono' => null,
        'titulo' => null,
        'descripcion' => null,
    ];

    public $rules = [
        'crearFormulario.icono' => 'required',
        'crearFormulario.titulo' => 'required',
        'crearFormulario.descripcion' => 'required',
    ];

    protected $validationAttributes = [
        'crearFormulario.icono' => 'icono',
        'crearFormulario.titulo' => 'titulo',
        'crearFormulario.descripcion' => 'descripción',

        'editarFormulario.icono' => 'icono',
        'editarFormulario.titulo' => 'titulo',
        'editarFormulario.descripcion' => 'descripción',
    ];

    protected $messages = [
        'crearFormulario.icono.required' => 'El :attribute es requerido.',
        'crearFormulario.titulo.required' => 'El :attribute es requerido.',
        'crearFormulario.descripcion.required' => 'El :attribute es requerido.',

        'editarFormulario.icono.required' => 'El :attribute es requerido.',
        'editarFormulario.titulo.required' => 'El :attribute es requerido.',
        'editarFormulario.descripcion.required' => 'El :attribute es requerido.',
    ];

    public function mount()
    {
        $this->traerFortalezas();
    }

    public function traerFortalezas()
    {
        $this->fortalezas = Fortaleza::all();
    }

    public function crearFortaleza()
    {
        $this->validate();
        
        Fortaleza::create($this->crearFormulario);
        $this->traerFortalezas();
        $this->emit('mensajeCreado', "Fortaleza creado.");

        $this->reset('crearFormulario');
    }

    public function editarFortaleza(Fortaleza $fortaleza)
    {
        $this->fortaleza = $fortaleza;

        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['icono'] = $fortaleza->icono;
        $this->editarFormulario['titulo'] = $fortaleza->titulo;
        $this->editarFormulario['descripcion'] = $fortaleza->descripcion;
    }

    public function actualizarFortaleza()
    {
        $this->validate([
            'editarFormulario.icono' => 'required',
            'editarFormulario.titulo' => 'required',
            'editarFormulario.descripcion' => 'required',
        ]);

        $this->fortaleza->update($this->editarFormulario);

        $this->traerFortalezas();
        $this->reset('editarFormulario');
        $this->emit('mensajeActualizado', "Fortaleza actualizada.");
    }

    public function eliminarFortaleza(Fortaleza $fortaleza)
    {
        $fortaleza->delete();
        $this->traerFortalezas();
    }

    public function render()
    {
        return view('livewire.administrador.fortaleza.pagina-fortaleza-administrador')->layout('layouts.administrador.administrador');
    }
}
