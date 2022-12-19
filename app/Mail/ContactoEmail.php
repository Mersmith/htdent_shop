<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $correo_contacto, $nombre_contacto;

    public $ccEmails = ["smith_14adidas@hotmail.com", "mersmith14@gmail.com"];

    public function __construct(public string $nombre, public string $email, public string $celular, public string $mensaje)
    {
        $this->correo_contacto = $email;
        $this->nombre_contacto = $nombre;
    }

    public function build()
    {
        return $this
            ->from($this->correo_contacto, 'HTDent')
            ->cc($this->ccEmails)
            ->subject('Quiero contactarme')
            ->replyTo($this->correo_contacto)
            ->view('email.email-contacto-template')
            ->with([
                'contact' => $this->nombre_contacto
            ]);

        //return $this->from($this->correo)->subject('Quiero contactarme')->replyTo($this->email)->view('email.email-contacto-template');
    }
}
