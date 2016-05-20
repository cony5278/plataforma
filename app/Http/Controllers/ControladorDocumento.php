<?php

namespace App\Http\Controllers;

use App\Documento;
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

    public function buscador(Request $request)
    {

        //no eligio nada
//        if ($request->input('seleccione_tipo_documento') == "seleccione_tipo_documento" && $request->input('seleccione_ubicacion') == "seleccione_ubicacion")
//            if(!is_numeric($request->input('buscador_general')[0])&&$request->input('buscador_general')[0]!="")
//                $consulta = Documento::where('nombre_persona','LIKE','%'.$request->input('buscador_general').'%')->get();
//            else
//                $consulta = Documento::where('numero_documento','LIKE','%'.$request->input('buscador_general').'%')->get();
//
//        else if ($request->input('seleccione_tipo_documento') != "seleccione_tipo_documento" && $request->input('seleccione_ubicacion') == "seleccione_ubicacion")
//            $consulta = Documento::where('tipo_documento',$request->input('seleccione_tipo_documento'))->get();


//        if ($request->input('seleccione_tipo_documento') == "seleccione_tipo_documento" && $request->input('seleccione_ubicacion') == "seleccione_ubicacion")

        if($request->input('buscador_general')!=" ") {
            if (!is_numeric($request->input('buscador_general')[0])) {
                //no es numerico y vacio los selectores
                $this->repetido($request);
            } else {
                //si es numerico y vacio los selectores
                $this->repetido($request);
          } //salir un mensaje que escriba algo mas bien
        }else{
            echo "tiene que se diferente de vacio";
        }
        return "entro";
    }

    private function repetido(Request $request){
        if ($request->input('tipo_documento') == "seleccione_tipo_documento" && $request->input('ubicacion') == "seleccione_ubicacion")
            echo "vacio 2";
        else if ($request->input('tipo_documento') != "seleccione_tipo_documento" && $request->input('ubicacion') == "seleccione_ubicacion")
            echo "selecciono un tipo de documento 2";
        else if ($request->input('tipo_documento') == "seleccione_tipo_documento" && $request->input('ubicacion') != "seleccione_ubicacion")
            echo "selecciono ubicacion 2";
        else if ($request->input('tipo_documento') != "seleccione_tipo_documento" && $request->input('ubicacion') != "seleccione_ubicacion")
            echo "selecciono un tipo de documento 2 && selecciono ubicacion 2";
    }
    private function auxrepetido(Request $request){
        if ($request->input('tipo_documento') == "seleccione_tipo_documento" && $request->input('ubicacion') == "seleccione_ubicacion")
            echo "vacio 2";
        else if ($request->input('tipo_documento') != "seleccione_tipo_documento" && $request->input('ubicacion') == "seleccione_ubicacion")
            echo "selecciono un tipo de documento 2";
        else if ($request->input('tipo_documento') == "seleccione_tipo_documento" && $request->input('ubicacion') != "seleccione_ubicacion")
            echo "selecciono ubicacion 2";
        else if ($request->input('tipo_documento') != "seleccione_tipo_documento" && $request->input('ubicacion') != "seleccione_ubicacion")
            echo "selecciono un tipo de documento 2 && selecciono ubicacion 2";
    }
}
