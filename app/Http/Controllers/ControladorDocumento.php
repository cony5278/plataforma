<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Publicacion;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ControladorDocumento extends Controller
{

    protected $redirectTo = 'usuario';

    public function registrar(Request $request)
    {
        Documento::create($request->all());
        $files = $request->file('archivo');
        foreach ($files as $file) {
            $nombre = Carbon::now()->toTimeString() . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre, \File::get($file));
        }
    }

    public function buscador(Request $request){



        if($request->has('buscador_general')) {
            if (!is_numeric($request->input('buscador_general'))) {
//                echo"no es numerico y vacio los selectores";
                return $this->repetido($request);
            } else {
//                echo "si es numerico y vacio los selectores";
                return $this->repetido($request);
            } //salir un mensaje que escriba algo mas bien
        }else{
//            echo "tiene que se difere nte de vacio";
        }

    }

    private function repetido(Request $request){
        if ($request->input('tipo_documento') == "seleccione_tipo_documento" && $request->input('ubicacion') == "seleccione_ubicacion") {

            $publicaciones = Publicacion::join('documentos', 'documentos.publicacion_id', '=', 'publicacions.id')->join('imagens','imagens.documento_id','=','documentos.id')->where('nombre_persona','LIKE','%'.$request->input('buscador_general').'%')->orWhere('numero_documento','LIKE','%'.$request->input('buscador_general').'%')->get();
            return $publicaciones;
        }else if ($request->input('tipo_documento') != "seleccione_tipo_documento" && $request->input('ubicacion') == "seleccione_ubicacion"){
            return $publicaciones=Publicacion::join('documentos', 'documentos.publicacion_id', '=', 'publicacions.id')->join('imagens','imagens.documento_id','=','documentos.id')->where
            (function($query)
            {

                $query->where('nombre_persona','LIKE','%'.Input::get('buscador_general').'%')
                    ->orWhere('numero_documento','LIKE','%'.Input::get('buscador_general').'%');
            })->where('tipo_documento',$request->input('tipo_documento'))->get();


        }  else if ($request->input('tipo_documento') == "seleccione_tipo_documento" && $request->input('ubicacion') != "seleccione_ubicacion")
        {
            return $publicaciones=Publicacion::join('documentos', 'documentos.publicacion_id', '=', 'publicacions.id')->join('imagens','imagens.documento_id','=','documentos.id')->join('users','users.id','=','imagens.user_id')->join('lugars','lugars.id','=','users.lugar_id')->where
            (function($query)
            {
                $query->where('nombre_persona','LIKE','%'.Input::get('buscador_general').'%')
                    ->orWhere('numero_documento','LIKE','%'.Input::get('buscador_general').'%');
            })->where('lugar_id',$request->input('ubicacion'))->get();


        } else if ($request->input('tipo_documento') != "seleccione_tipo_documento" && $request->input('ubicacion') != "seleccione_ubicacion")
        {
            return $publicaciones=Publicacion::join('documentos', 'documentos.publicacion_id', '=', 'publicacions.id')->join('imagens','imagens.documento_id','=','documentos.id')->join('users','users.id','=','imagens.user_id')->join('lugars','lugars.id','=','users.lugar_id')->where
            (function($query)
            {
                $query->where('nombre_persona','LIKE','%'.Input::get('buscador_general').'%')
                    ->orWhere('numero_documento','LIKE','%'.Input::get('buscador_general').'%');
            })->where('tipo_documento',$request->input('tipo_documento'))->where('lugar_id',$request->input('ubicacion'))->get();

        }


    }

}
