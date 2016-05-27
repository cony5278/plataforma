<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Documento;
use App\Publicacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ControladorPubliDocumenImagen extends Controller
{
    protected $redirectTo = 'usuario';

    public function registrar(Request $request)
    {
        $publicacion = Publicacion::create([
            'titulo_publicacion' => $request->input('titulo_publicacion'),
            'descripcion_publicacion' => $request->input('descripcion_publicacion'),
            'fecha_hora_publicacion' => Carbon::now()->toDateTimeString(),
            'user_id' => Auth::user()->id,
        ]);
        $nombre_documento = $request->input('nombre_persona');
        $valor = 0;
        for ($i = 0; $i < count($nombre_documento); $i++) {
            $documento = Documento::create([
                'nombre_persona' => $request->input('nombre_persona')[$i],
                'numero_documento' => $request->input('numero_documento')[$i],
                'tipo_documento' => $request->input('tipo_documento')[$i],
                'publicacion_id' => $publicacion->id,
            ]);
            $files = $request->file('archivo');
            for ($j = $valor; $j < count($files); $j++) {
                if ($request->file('archivo')[$j]->getClientOriginalName()[0] == $i+1) {
//                    echo "entro cuantas veces ".$j;
                    $valor++;
                    $nombre = Carbon::now()->toTimeString() . $request->file('archivo')[$j]->getClientOriginalName();
                    $ruta=Auth::user()->email."/".$documento->tipo_documento;
                    if(!(\Storage::exists($ruta)))
                        \Storage::makeDirectory($ruta);
                    \Storage::disk('local')->put($ruta."/".$nombre, \File::get($request->file('archivo')[$j]));
                    Imagen::create([
                        'ruta_imagen' => $ruta."/".$nombre,
                        'user_id' => Auth::user()->id,
                        'documento_id' => $documento->id,
                    ]);
                } else {
                    $j = $valor-1;
                    break;
                }
            }
        }
    }
}