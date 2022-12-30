<?php

namespace App\Http\Controllers\Crd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CrdController extends Controller
{
    //http://127.0.0.1:8000/crd-dni
    public function buscarDni()
    {
        //$dni = '151';
        $dni = '15151';
        $datos = HTTP::get('https://centroradiologico.com.pe/apis/apisDNI/items/read.php?DocumentoI=' . $dni)->object();

        if ($datos) {
            return $datos;//{ "items": [{}]}
        } else {
            return $datos;//{}
        }
    }

    //http://127.0.0.1:8000/crd-actualizar-puntos
    public function actualizarPuntos()
    {
        $response = Http::post('https://centroradiologico.com.pe/apis/apisDNI/items/update.php', [
            //'DocumentoI' => '15151',
            'DocumentoI' => '151',
            'total_puntos' => '30',
        ]);

        return $response;
    }

    //http://127.0.0.1:8000/crd-email
    public function buscarEmail()
    {
        //$email = 'treva.kshlerin@example.net';
        $email = 'GAVIOTAMALL@HOTMAIL.COM';
        $datos = HTTP::get('https://centroradiologico.com.pe/apis/apisCorreo/items/read.php?correo_electronico=' . $email)->object();

        return $datos;
    }
}
