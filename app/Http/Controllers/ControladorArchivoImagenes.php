<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
class ControladorArchivoImagenes extends Controller
{
    public function guardar(Request $request){
        $files = $request->file('archivo');
        foreach($files as $file){
            $nombre = Carbon::now()->toTimeString().$file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }
        return "hecho";
    }
}
