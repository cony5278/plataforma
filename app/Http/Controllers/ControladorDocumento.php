<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use App\Http\Requests;

class ControladorDocumento extends Controller
{

    protected $redirectTo = 'usuario';
    public function registrar(Request $request)
    {
       Documento::create($request->all());
    }
}
