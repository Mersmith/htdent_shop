<?php

namespace App\Http\Livewire\Administrador\Testimonio;

use App\Models\Imagen;
use App\Models\Testimonio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PaginaTestimonioAdministrador extends Component
{
    use WithFileUploads;

    public $testimonios, $testimonio, $editarImagen;

    protected $listeners = ['eliminarTestimonio', 'posicionTestimonio'];

    public $crearFormulario = [
        'nombre' => null,
        'cargo' => null,
        'comentario' => null,
        'posicion' => null,
        'imagen_ruta' => null,
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => null,
        'cargo' => null,
        'comentario' => null,
        'posicion' => null,
        'imagen_ruta' => null,
    ];

    protected $rules = [
        'crearFormulario.nombre' => 'required',
        'crearFormulario.cargo' => 'required',
        'crearFormulario.comentario' => 'required',
        'crearFormulario.imagen_ruta' => 'required|image|max:1024',
    ];

    public function mount()
    {
        $this->traerTestimonios();
    }

    public function traerTestimonios()
    {
        $this->testimonios = Testimonio::orderBy('posicion', 'asc')->get();
    }

    public function crearTestimonio()
    {
        $this->validate();

        $imagen = $this->crearFormulario['imagen_ruta']->store('testimonios');

        $testimonio = Testimonio::create([
            'nombre' => $this->crearFormulario['nombre'],
            'cargo' => $this->crearFormulario['cargo'],
            'comentario' => $this->crearFormulario['comentario'],
            'posicion' => $this->testimonios->count() + 1
        ]);

        $testimonio->imagenes()->create([
            'imagen_ruta' => $imagen
        ]);

        $this->traerTestimonios();

        $this->emit('mensajeCreado', "Testimonio agregado.");
        $this->reset('crearFormulario');
    }


    public function editarTestimonio(Testimonio $testimonio)
    {
        //Reinicia el valor de la variable
        $this->reset(['editarImagen']);
        //Borrar los errores de las claves
        //$this->resetValidation();

        $this->testimonio = $testimonio;

        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['nombre'] = $testimonio->nombre;
        $this->editarFormulario['cargo'] = $testimonio->cargo;
        $this->editarFormulario['comentario'] = $testimonio->comentario;
        $this->editarFormulario['posicion'] = $testimonio->posicion;
        $this->editarFormulario['imagen_ruta'] = $testimonio->imagenes->first()->imagen_ruta;
    }

    public function actualizarTestimonio()
    {
        $rules = [
            'editarFormulario.nombre' => 'required',
            'editarFormulario.cargo' => 'required',
            'editarFormulario.comentario' => 'required',
        ];

        if ($this->editarImagen) {
            $rules['editarImagen'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editarImagen) {
            Storage::delete([$this->testimonio->imagenes->first()->imagen_ruta]);

            $imagenBusqueda = Imagen::find($this->testimonio->imagenes->first()->id);
            $imagenBusqueda->delete();

            $imagenNueva = $this->editarImagen->store('testimonios');

            $this->testimonio->imagenes()->create([
                'imagen_ruta' => $imagenNueva
            ]);
        }

        $this->testimonio->update([
            'nombre' => $this->editarFormulario['nombre'],
            'cargo' => $this->editarFormulario['cargo'],
            'comentario' => $this->editarFormulario['comentario'],
        ]);

        $this->reset(['editarFormulario', 'editarImagen']);

        $this->traerTestimonios();

        $this->emit('mensajeActualizado', "El Testimonio ha sido actualizado.");
    }

    public function eliminarTestimonio(Testimonio $testimonioSelect)
    {
        $testimonioSelect->delete();
        $this->traerTestimonios();
    }

    public function posicionTestimonio($sorts)
    {
        $posicion = 1;

        foreach ($sorts as $sort) {
            $slider = Testimonio::find($sort);
            $slider->posicion = $posicion;
            $slider->save();

            $posicion++;
        }

        $this->traerTestimonios();

    }

    public function render()
    {
        return view('livewire.administrador.testimonio.pagina-testimonio-administrador')->layout('layouts.administrador.administrador');
    }
}
