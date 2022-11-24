<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CuponesController extends Controller
{
    public function index()
    {
        $fechaActual = Carbon::now()->format('Y-m-d');
        $cupones = Cupon::query()->where('fecha_expiracion', '>', $fechaActual)->get();

        return view('cliente.cupon.pagina-index', compact('cupones'));
    }
}
