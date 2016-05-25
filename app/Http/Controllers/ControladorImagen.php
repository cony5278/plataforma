<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Imagen;
use Carbon\Carbon;

class ControladorImagen extends Controller
{
    public function registrar(Request $request)
    {
        $archivos = $request->file('archivo');
        foreach ($archivos as $archivo) {
            $nombre = Carbon::now()->toTimeString() . $archivo->getClientOriginalName();
            \Storage::disk('local')->put($nombre, \File::get($archivo));
            Imagen::create([
                'nombre_imagen' => $nombre,
                'user_id' => Auth::user()->id,
            ]);
        }
    }
}
