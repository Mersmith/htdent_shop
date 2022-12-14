<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    use AuthorizesRequests;

    //Mis Ordenes en total
    public function index()
    {
        $ordenes = Orden::query()->where('user_id', auth()->user()->id);

        if (request('estado')) {
            $ordenes->where('estado', request('estado'));
        }

        $ordenes = $ordenes->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        //$ordenes = $ordenes->get();

        $pendiente = Orden::where('estado', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Orden::where('estado', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Orden::where('estado', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Orden::where('estado', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Orden::where('estado', 5)->where('user_id', auth()->user()->id)->count();

        return view('cliente.orden.pagina-index', compact('ordenes', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    //Mostrar un Orden
    public function mostrar(Orden $orden)
    {
        $this->authorize('autor', $orden);

        $envio = json_decode($orden->envio);
        $productosCarrito = json_decode($orden->contenido);

        return view('cliente.orden.pagina-mostrar', compact('orden', 'productosCarrito', 'envio'));
    }

    //Orden comprado
    public function comprarMercadoPago(Orden $orden, Request $request)
    {
        $this->authorize('autor', $orden);

        $pago_id = $request->get('payment_id');
        $respuesta = Http::get("https://api.mercadopago.com/v1/payments/$pago_id" . "?access_token=APP_USR-8561333830862927-083023-1ec6a1be6d0f23e7f261f1bdf82eac53-1189431842");
        $respuesta = json_decode($respuesta);
        //dump($reponse);
        $estadoPago = $respuesta->status;
        if ($estadoPago == 'approved') {
            $orden->estado = 2;
            $orden->save();
        }
        return redirect()->route('cliente.orden.mostrar', $orden);
    }

    public function comprarPaypal(Orden $orden, Request $request)
    {
        $productosCarrito = json_decode($orden->contenido);

        $totalPuntosProducto = 0;
        foreach ($productosCarrito as $producto) {
            $totalPuntosProducto += $producto->options->puntos_ganar * $producto->qty;
        }

        $this->authorize('autor', $orden);

        if (Auth::user()->cliente->puntos <= $orden->puntos_canjeados) {
            $orden->total = $orden->total + $orden->puntos_canjeados * config('services.crd.puntos');
            $orden->puntos_canjeados = 0;

            Auth::user()->cliente->update(
                [
                    'puntos' => Auth::user()->cliente->puntos  + $totalPuntosProducto,
                ]
            );
        } else {
            Auth::user()->cliente->update(
                [
                    'puntos' => Auth::user()->cliente->puntos - $orden->puntos_canjeados + $totalPuntosProducto,
                ]
            );
        }

        $orden->estado = 2;
        $orden->save();
        return redirect()->route('cliente.orden.mostrar', $orden);
    }
}
