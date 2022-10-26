<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function mostrar(Producto $producto)
    {
        return view('frontend.producto.pagina-producto', compact('producto'));
    }
}
