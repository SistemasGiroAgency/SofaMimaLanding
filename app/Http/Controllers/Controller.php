<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('index');
    }


    public function enviarInfo(Request $request){
        $data = $request->all();
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'celular' => 'required',
            'mensaje' => 'required',
        ]);

        $name = $request['name'];
        $email = $request['email'];
        $celular = $request['celular'];
        $mensaje = $request['mensaje'];

        $destinatario = "emiliodg511@gmail.com";

        $asunto = "Un usuario envio su informacion de contacto";

        $cuerpo = "Nombre: " . $name . "\nEmail: " . $email . "\nCelular:" . $celular . "\nMensaje: " . $mensaje;

        mail($destinatario, $asunto, $cuerpo);

        header('Location: formulario.html?enviado=true');
        
    }
}

