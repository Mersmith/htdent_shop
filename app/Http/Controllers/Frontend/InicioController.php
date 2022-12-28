<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fortaleza;
use App\Models\MediosPago;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\Slider;
use App\Models\Testimonio;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()) {

            $pendiente = Orden::where('estado', 1)->where('user_id', auth()->user()->id)->count();

            if ($pendiente) {

                //$html = "<a class='font-bold' href='" . route('cliente.orden.index') . "?estado=1'>Ir a pagar</a>";
                $mensaje = "Usted tiene $pendiente ordenes pendientes. <a class='font-bold' href='" . route('cliente.orden.index') ."?estado=1'>Ir a pagar</a>";

                session()->flash('flash.banner', $mensaje);
            }
        }

        $sliders = Slider::where('estado', '0')->get();
        //$productos = Producto::limit(10)->get();
        $fortalezas = Fortaleza::all();
        $testimonios = Testimonio::all();
        $medios = MediosPago::all();

        return view('frontend.inicio.inicio', compact('sliders', 'fortalezas', 'testimonios', 'medios'));
    }
}
