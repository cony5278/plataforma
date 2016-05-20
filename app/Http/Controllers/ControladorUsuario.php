<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class ControladorUsuario extends Controller
{
    public function actulizarUsuario(Request $request){
        $usuario=new User();
        if($request->has('name'))
            return $usuario->actualizarNombre($request->input('name'));
        if($request->has('last_name'))
            return $usuario->actualizarApellido($request->input('last_name'));
        if($request->has('nombre_usuario'))
            return $usuario->actualizarNombreUsuario($request->input('nombre_usuario'));
        if($request->has('email'))
            return $usuario->actualizarCorreo($request->input('correo'));
        if($request->has('latitud')&&$request->has('longitud')&&$request->has('nombre_lugar') )
            $usuario->actualizarCoordenadas($request->input('latitud'),$request->input('longitud'),$request->input('nombre_lugar') );

//        return $request->input('name');
    }
}
