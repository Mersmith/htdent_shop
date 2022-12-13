<?php

namespace App\Http\Livewire\Administrador\MediosPago;

use App\Models\Imagen;
use App\Models\MediosPago;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PaginaMediosPagoAdministrador extends Component
{
    use WithFileUploads;

    public $medios, $medio, $editarImagen;

    protected $listeners = ['eliminarMedio', 'posicionMedios'];

    public $crearFormulario = [
        'imagen_ruta' => null,
    ];

    public $editarFormulario = [
        'abierto' => false,
        'imagen_ruta' => null,
        'posicion' => null,
    ];

    protected $rules = [
        'crearFormulario.imagen_ruta' => 'required|image|max:1024',
    ];

    public function mount()
    {
        $this->traerMedios();
    }

    public function traerMedios()
    {
        $this->medios = MediosPago::orderBy('posicion', 'asc')->get();
    }

    public function crearMedios()
    {
        $this->validate();

        $imagen = $this->crearFormulario['imagen_ruta']->store('medios');

        $medio = MediosPago::create([
            'posicion' => $this->medios->count() + 1
        ]);

        $medio->imagenes()->create([
            'imagen_ruta' => $imagen
        ]);

        $this->traerMedios();

        $this->emit('mensajeCreado', "Medio de Pago agregado.");
        $this->reset('crearFormulario');
    }

    public function editarMedios(MediosPago $medio)
    {
        //Reinicia el valor de la variable
        $this->reset(['editarImagen']);
        //Borrar los errores de las claves
        //$this->resetValidation();

        $this->medio = $medio;

        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['posicion'] = $medio->posicion;
        $this->editarFormulario['imagen_ruta'] = $medio->imagenes->first()->imagen_ruta;
    }

    public function actualizarMedios()
    {
        $rules = [];

        if ($this->editarImagen) {
            $rules['editarImagen'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editarImagen) {
            Storage::delete([$this->medio->imagenes->first()->imagen_ruta]);

            $imagenBusqueda = Imagen::find($this->medio->imagenes->first()->id);
            $imagenBusqueda->delete();

            $imagenNueva = $this->editarImagen->store('medios');

            $this->medio->imagenes()->create([
                'imagen_ruta' => $imagenNueva
            ]);
        }

        $this->reset(['editarFormulario', 'editarImagen']);

        $this->traerMedios();

        $this->emit('mensajeActualizado', "El Método de Pago ha sido actualizado.");
    }

    public function eliminarMedio(MediosPago $medioSelect)
    {
        $medioSelect->delete();
        $this->traerMedios();
    }

    public function posicionMedios($sorts)
    {
        $posicion = 1;

        foreach ($sorts as $sort) {
            $medio = MediosPago::find($sort);
            $medio->posicion = $posicion;
            $medio->save();

            $posicion++;
        }

        $this->traerMedios();
    }

    public function render()
    {
        return view('livewire.administrador.medios-pago.pagina-medios-pago-administrador')->layout('layouts.administrador.administrador');
    }
}
