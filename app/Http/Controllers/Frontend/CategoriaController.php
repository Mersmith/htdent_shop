<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function mostrar(Categoria $categoria)
    {
        return view('frontend.categoria.pagina-categoria', compact('categoria'));
    }
}
