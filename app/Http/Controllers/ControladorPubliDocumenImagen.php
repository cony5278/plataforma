<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Documento;
use App\Publicacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ControladorPubliDocumenImagen extends Controller
{
    protected $redirectTo = 'usuario';
    public function registrar(Request $request)
    {
        $publicacion=Publicacion::create([
            'descripcion_publicacion'=>$request->input('descripcion_publicacion'),
            'fecha_hora_publicacion'=>Carbon::now()->toDateTimeString(),
        ]);
        $nombre_documento=$request->input('nombre_documento');
        for($i = 0; $i < count($nombre_documento); ++$i) {
            $documento = Documento::create([
                'nombre_documento' => $request->input('nombre_documento')[$i],
                'nombre_persona' => $request->input('nombre_persona')[$i],
                'apellido_persona' => $request->input('apellido_persona')[$i],
                'tipo_documento' => $request->input('tipo_documento')[$i],
                'user_id' => Auth::user()->id,
                'publicacion_id' => $publicacion->id,
            ]);
        }
////        //cuando el usuario quiera subir una imagen o elegir de la galeria que ya tiene
        $files = $request->file('archivo');
        foreach ($files as $file) {
            $nombre = Carbon::now()->toTimeString() . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre, \File::get($file));
            Imagen::create([
                'nombre_imagen' => $nombre,
                'user_id' => Auth::user()->id,
                'documento_id' => $documento->id,
            ]);
        }
    }
}
