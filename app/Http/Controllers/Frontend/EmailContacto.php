<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactoEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailContacto extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'celular' => 'required',
            'mensaje' => 'required',
        ]);
        //config('services.gmail.email'), 
        //Cuando se envia con con el $request->email: No miras el mensaje como administrador, solo ve el cliente.
        //Cuando se envia con con el mersmith14@gmail.com: Miras el mensaje como administrador, y el cliente no lo ve.
        Mail::to($request->email)->send(new ContactoEmail($request->nombre, $request->email, $request->celular, $request->mensaje));

        return redirect()->back()->with('email-contacto-correcto', 'Enviado correctamente');
    }
}
