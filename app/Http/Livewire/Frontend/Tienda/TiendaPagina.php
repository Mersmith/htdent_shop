<?php

namespace App\Http\Livewire\Frontend\Tienda;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Database\Eloquent\Builder;

class TiendaPagina extends Component
{
    use WithPagination;
    public $categorias, $subcategorias, $marcas;
    public $categoria, $subcategoria, $marca;
    public $vista = "grid";
    public $minimo = 0, $maximo=7000;


    protected $queryString = ['categoria', 'subcategoria', 'marca'];

    public function mount()
    {
        $this->categorias = Categoria::all();
        //$this->categoria = $this->categorias->first()->id;
    }
    
    public function updatedCategoria()
    {
        $this->reset(['subcategoria', 'marca', 'page', 'minimo']);
    }

    public function updatedSubcategoria()
    {
        //Palabra reservada para resetear la paginación
        $this->resetPage();
    }

    public function updatedMarca()
    {
        //Palabra reservada para resetear la paginación
        $this->resetPage();
    }

    //Page campo de WithPagination 
    public function limpiarFiltro()
    {
        $this->reset(['categoria', 'subcategoria', 'marca', 'page']);
    }

    public function render()
    {
        $productosQuery = Producto::query();

        if ($this->categoria) {

            $productosQuery = $productosQuery->whereHas('subcategoria.categoria', function (Builder $query) {
                $query->where('id', $this->categoria);
            });

            $this->subcategorias = Subcategoria::where('categoria_id', $this->categoria)->get();

            $this->marcas = Marca::whereHas('categorias', function (Builder $query) {
                $query->where('categoria_id', $this->categoria);
            })->get();
        }

        if ($this->subcategoria) {
            $productosQuery = $productosQuery->whereHas('subcategoria', function (Builder $query) {
                $query->where('id', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productosQuery = $productosQuery->whereHas('marca', function (Builder $query) {
                $query->where('nombre', $this->marca);
            });
        }

        $productos = $productosQuery->whereBetween('precio', [$this->minimo, $this->maximo])->paginate(10);

        return view('livewire.frontend.tienda.tienda-pagina', compact('productos'))->layout('layouts.frontend.frontend');
    }
}
