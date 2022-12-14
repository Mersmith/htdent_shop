<?php

namespace App\Http\Livewire\Administrador\Producto;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Subcategoria;
use App\Models\Producto;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PaginaCrearProductoAdministrador extends Component
{
    use WithFileUploads;

    //Los detectores de eventos
    protected $listeners = ['cambiarPosicionImagenes'];


    public $categorias, $subcategorias = [], $marcas = [], $imagenes = [];

    public $categoria_id = "",  $subcategoria_id = "", $marca_id = "";
    public $nombre = null, $slug = null, $link_video = null, $sku = null,  $precio = 1, $precio_real = 1, $descripcion = null,
        $informacion = null, $puntos_ganar = 0, $puntos_tope = 0,
        $tiene_detalle = false, $detalle = null,  $stock_total = 0, $estado = 1;

    protected $rules = [
        'categoria_id' => 'required',
        'subcategoria_id' => 'required',
        'marca_id' => 'required',
        'nombre' => 'required',
        'slug' => 'required|unique:productos',
        'sku' => 'required|unique:productos',
        'precio_real' => 'required',
        'precio' => 'required',
        'descripcion' => 'required',
        'informacion' => 'required',
        'puntos_ganar' => 'required',
        'puntos_tope' => 'required',
        'tiene_detalle' => 'required',
        'estado' => 'required',
    ];

    protected $validationAttributes = [
        'categoria_id' => 'categoria del producto',
        'subcategoria_id' => 'subcategoria del producto',
        'marca_id' => 'marca del producto',
        'nombre' => 'nombre del producto',
        'slug' => 'slug del producto',
        'sku' => 'sku del producto',
        'precio_real' => 'precio real del producto',
        'precio' => 'precio de oferta del producto',
        'descripcion' => 'descripcion del producto',
        'informacion' => 'informacion del producto',
        'puntos_ganar' => 'puntos a ganar del producto',
        'puntos_tope' => 'monto del carrito del producto',
        'tiene_detalle' => 'detalle del producto',
        'estado' => 'estado del producto',
        'stock_total' => 'stock del producto',
        'detalle' => 'detalle del producto',
    ];

    protected $messages = [
        'categoria_id.required' => 'La :attribute es requerido.',
        'subcategoria_id.required' => 'La :attribute es requerido.',
        'marca_id.required' => 'La :attribute es requerido.',
        'nombre.required' => 'El :attribute es requerido.',
        'slug.required' => 'El :attribute es requerido.',
        'sku.required' => 'El :attribute es requerido.',
        'precio_real.required' => 'El :attribute es requerido.',
        'precio.required' => 'El :attribute es requerido.',
        'descripcion.required' => 'La :attribute es requerido.',
        'informacion.required' => 'La :attribute es requerido.',
        'puntos_ganar.required' => 'Los :attribute es requerido.',
        'puntos_tope.required' => 'Los :attribute es requerido.',
        'tiene_detalle.required' => 'El :attribute es requerido.',
        'estado.required' => 'El :attribute es requerido.',
        'stock_total.required' => 'El :attribute es requerido.',
        'detalle.required' => 'El :attribute es requerido.',
    ];

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();

        $this->marcas = Marca::whereHas('categorias', function (Builder $query) use ($value) {
            $query->where('categoria_id', $value);
        })->get();

        $this->reset(['subcategoria_id', 'marca_id']);
    }

    public function updatedNombre($value)
    {
        $this->slug = Str::slug($value);
        $this->sku = trim(mb_strtoupper(mb_substr($value, 0, 2)) . "-" . "S" . rand(1, 500) . strtoupper(mb_substr($value, -2)));
    }

    public function updatedPrecioReal($value)
    {
        $this->precio = $value;
    }

    //Propiedad computada
    public function getSubcategoriaProperty()
    {
        return Subcategoria::find($this->subcategoria_id);
    }

    public function eliminarImagen($index)
    {
        array_splice($this->imagenes, $index, 1);
    }

    public function cambiarPosicionImagenes($sorts)
    {
        $sorted = [];

        foreach ($sorts as  $position) {
            $existe = $this->imagenes[$position];
            array_push($sorted, $existe);
        }

        $this->imagenes = $sorted;
    }

    public function crearProducto()
    {
        $rules = $this->rules;

        if ($this->subcategoria_id) {
            if (!$this->subcategoria->tiene_color && !$this->subcategoria->medida) {
                $rules['stock_total'] = 'required';
            }
        }

        if ($this->tiene_detalle) {
            $rules['detalle'] = 'required';
        } else {
            $this->detalle = null;
        }

        $this->validate($rules);

        $producto = new Producto();

        $producto->subcategoria_id  = $this->subcategoria_id;
        $producto->marca_id  = $this->marca_id;
        $producto->nombre = $this->nombre;
        $producto->slug = $this->slug;
        $producto->sku = $this->sku;
        $producto->precio = $this->precio;
        $producto->precio_real = $this->precio_real;
        $producto->descripcion = $this->descripcion;
        $producto->link_video = $this->link_video;
        $producto->informacion = $this->informacion;
        $producto->puntos_ganar = $this->puntos_ganar;
        $producto->puntos_tope = $this->puntos_tope;
        $producto->tiene_detalle = $this->tiene_detalle;
        $producto->detalle = $this->detalle;
        $producto->estado  = $this->estado;

        if ($this->subcategoria_id) {
            if (!$this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida) {
                $producto->stock_total = $this->stock_total;
            }
        }

        $producto->save();

        $this->validate([
            'imagenes.*' => 'image|max:1024',
        ]);

        foreach ($this->imagenes as $key => $imagen) {
            $urlImagen = Storage::put('productos', $imagen);

            $producto->imagenes()->create([
                'imagen_ruta' => $urlImagen,
                'posicion' => $key + 1,
            ]);
        }

        $this->emit('mensajeCreado', "El producto fué creado.");

        return redirect()->route('administrador.producto.editar', $producto);
    }

    public function render()
    {
        return view('livewire.administrador.producto.pagina-crear-producto-administrador')->layout('layouts.administrador.administrador');
    }
}
