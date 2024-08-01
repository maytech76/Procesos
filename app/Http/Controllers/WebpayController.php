<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class WebpayController extends Controller
{
    public function comprar()
    {
        return view('webpay.comprar');
    }

    public function pagar()
    {
        $orden_compra = Str::random(10);
        $Session_Id = Str::random(10);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Tbk-Api-Key-Id' => env('WEBPAY_ID'),
            'Tbk-Api-Key-Secret'=>env('WEBPAY_SECRET')
        ])->post(env('WEBPAY_URL'), [
            'buy_order' => $orden_compra,
            'session_id' => $Session_Id,
            'amount' => 10000,
            'return_url' => 'http://webpay2.test/webpay/respuesta',

    
        ]);

        /* Validamos el status de la repuesta */
        if($response->status()!=200)
        {
            die("error");
        }
        $datos = json_decode($response);
        return view('webpay.pagar', compact('datos'));
    }


    public function respuesta()
    {
        $response = Http::withHeaders([  

             /* Definimos los Encabezados que exige webpay */
            'Content-Type' => 'application/json',
            'Tbk-Api-Key-Id' => env('WEBPAY_ID'),
            'Tbk-Api-Key-Secret'=>env('WEBPAY_SECRET')

            /* Se ejecuta la peticion Put */
        ])->put(env('WEBPAY_URL')."/".$_GET['token_ws'], [ ]);
        $datos = json_decode($response); /* descodificamos la data que lllega en formato Json */
        /* print_r($datos);exit; */
        return view('webpay.respuesta', compact('datos')); /* Retornamos la data recibida en la vista respuesta */
    }
}
