<?php

namespace App\Http\Livewire\Administrador\Producto;

use App\Models\Categoria;
use App\Models\Imagen;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class PaginaEditarProductoAdministrador extends Component
{
    protected $listeners = ['dropImagenes', 'eliminarProducto', 'editarProducto', 'cambiarPosicionImagenes'];

    public $producto, $categorias, $subcategorias, $link_video, $marcas, $slug, $sku, $tiene_detalle, $detalle, $stock_total;
    public $categoria_id;

    //toma y sincroniza los valores de $producto
    protected $rules = [
        'categoria_id' => 'required',
        'producto.subcategoria_id' => 'required',
        'producto.marca_id' => 'required',
        'producto.nombre' => 'required',
        'slug' => 'required|unique:productos,slug',
        'sku' => 'required|unique:productos,sku',
        'producto.precio_real' => 'required',
        'producto.precio' => 'required',
        'producto.descripcion' => 'required',
        'producto.informacion' => 'required',
        /*'producto.stock_total' => 'required',*/
        'producto.puntos_ganar' => 'numeric',
        'producto.puntos_tope' => 'numeric',
        'producto.tiene_detalle' => 'required',
        /*'producto.detalle' => 'required',*/
    ];

    protected $validationAttributes = [
        'categoria_id' => 'categoria del producto',
        'producto.subcategoria_id' => 'subcategoria del producto',
        'producto.marca_id' => 'marca del producto',
        'producto.nombre' => 'nombre del producto',
        'slug' => 'slug del producto',
        'sku' => 'sku del producto',
        'producto.precio_real' => 'precio real del producto',
        'producto.precio' => 'precio de oferta del producto',
        'producto.descripcion' => 'descripcion del producto',
        'producto.informacion' => 'informacion del producto',
        'producto.puntos_ganar' => 'puntos a ganar del producto',
        'producto.puntos_tope' => 'monto del carrito del producto',
        'producto.tiene_detalle' => 'detalle del producto',
        'producto.detalle' => 'detalle del producto',
        'producto.stock_total' => 'stock del producto',
        'stock_total' => 'stock del producto',
        /*'producto.detalle' => 'detalle del producto',*/
        'detalle' => 'detalle del producto',
    ];

    protected $messages = [
        'categoria_id.required' => 'La :attribute es requerido.',
        'producto.subcategoria_id.required' => 'La :attribute es requerido.',
        'producto.marca_id.required' => 'La :attribute es requerido.',
        'producto.nombre.required' => 'El :attribute es requerido.',
        'slug.required' => 'El :attribute es requerido.',
        'sku.required' => 'El :attribute es requerido.',
        'producto.precio_real.required' => 'El :attribute es requerido.',
        'producto.precio.required' => 'El :attribute es requerido.',
        'producto.descripcion.required' => 'La :attribute es requerido.',
        'producto.informacion.required' => 'La :attribute es requerido.',
        'producto.puntos_ganar.required' => 'Los :attribute es requerido.',
        'producto.puntos_tope.required' => 'Los :attribute es requerido.',
        'producto.tiene_detalle.required' => 'El :attribute es requerido.',
        'producto.detalle.required' => 'El :attribute es requerido.',
        'producto.stock_total.required' => 'El :attribute es requerido.',
        'stock_total.required' => 'El :attribute es requerido.',
        /*'producto.detalle.required' => 'El :attribute es requerido.',*/
        'detalle.required' => 'El :attribute es requerido.',
    ];

    public function mount(Producto $producto)
    {
        $this->producto = $producto;

        $this->categorias = Categoria::all();

        $this->categoria_id = $producto->subcategoria->categoria->id;

        $this->subcategorias = Subcategoria::where('categoria_id', $this->categoria_id)->get();

        $this->slug = $this->producto->slug;
        $this->sku = $this->producto->sku;
        $this->tiene_detalle = $this->producto->tiene_detalle;
        $this->detalle = $this->producto->detalle;
        $this->link_video = $this->producto->link_video;
        $this->stock_total = $this->producto->stock_total;

        $this->marcas = Marca::whereHas('categorias', function (Builder $query) {
            $query->where('categoria_id', $this->categoria_id);
        })->get();
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();

        $this->marcas = Marca::whereHas('categorias', function (Builder $query) use ($value) {
            $query->where('categoria_id', $value);
        })->get();

        $this->producto->subcategoria_id  = "";
        $this->producto->marca_id  = "";
    }

    public function updatedProductoNombre($value)
    {
        $this->slug = Str::slug($value);
        $this->sku = trim(strtoupper(substr($value, 0, 2)) . "-" . "S" . rand(1, 500) . strtoupper(substr($value, -2)));
    }

    public function getSubcategoriaProperty()
    {
        return Subcategoria::find($this->producto->subcategoria_id);
    }

    public function dropImagenes()
    {
        $this->producto = $this->producto->fresh();
    }

    public function cambiarPosicionImagenes($sorts)
    {
        $posicion = 1;

        foreach ($sorts as $sort) {

            $slider = Imagen::find($sort);
            $slider->posicion = $posicion;
            $slider->save();

            $posicion++;
        }

        $this->dropImagenes();
    }

    public function editarProducto()
    {
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:productos,slug,' . $this->producto->id;
        $rules['sku'] = 'required|unique:productos,sku,' . $this->producto->id;

        if ($this->producto->subcategoria_id) {
            if (!$this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida) {
                $rules['stock_total'] = 'required|numeric';
                $this->producto->stock_total = $this->stock_total;
            }/*else{
                $this->producto->stock_total = null;
            }*/
        }

        if ($this->tiene_detalle) {
            $rules['detalle'] = 'required';
        } else {
            $this->detalle = null;
        }

        $this->validate($rules);

        $this->producto->slug = $this->slug;
        $this->producto->sku = $this->sku;
        $this->producto->detalle = $this->detalle;
        $this->producto->link_video = $this->link_video;

        $this->producto->update();

        $imagenes_antiguas = $this->producto->ckeditors->pluck('imagen_ruta')->toArray();

        $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
        preg_match_all($re_extractImages, $this->producto->informacion, $matches);
        $imagenesCkeditors_nuevas = $matches[1];

        foreach ($imagenesCkeditors_nuevas as  $imgckeditor) {
            $urlImagenCkeditor = 'ckeditor/' . pathinfo($imgckeditor, PATHINFO_BASENAME);

            $clave = array_search($urlImagenCkeditor, $imagenes_antiguas);

            if ($clave === false) {
                $this->producto->ckeditors()->create([
                    'imagen_ruta' => $urlImagenCkeditor
                ]);
            } else {
                unset($imagenes_antiguas[$clave]);
            }
        }
        foreach ($imagenes_antiguas as  $imagen_antigua) {
            Storage::delete($imagen_antigua);
            $this->producto->ckeditors()->where('imagen_ruta', $imagen_antigua)->delete();
        }


        $this->emit('mensajeActualizado', "El producto ha sido actualizado.");
    }

    public function eliminarImagen(Imagen $imagen)
    {
        Storage::delete([$imagen->imagen_ruta]);
        $imagen->delete();

        $this->producto = $this->producto->fresh();
        $this->emit('mensajeEliminado', "La imagen fue eliminada.");
    }

    public function eliminarProducto()
    {

        $imagenes = $this->producto->imagenes;

        foreach ($imagenes as $imagen) {
            Storage::delete($imagen->imagen_ruta);
            $imagen->delete();
        }

        $this->producto->delete();

        return redirect()->route('administrador.producto.index');
    }

    public function render()
    {
        return view('livewire.administrador.producto.pagina-editar-producto-administrador')->layout('layouts.administrador.administrador');
    }
}
