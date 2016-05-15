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
        $files = $request->file('archivo');
        foreach($files as $file){
            $nombre = Carbon::now()->toTimeString().$file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }
    }
}
