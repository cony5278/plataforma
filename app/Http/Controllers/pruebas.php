<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class pruebas extends Controller
{
    public function crear(){
//        \Storage::makeDirectory("/nuevo");
        if(\Storage::exists("/nuevo")){
            \Storage::disk('local')->put("nuevo/nuevo.txt","fdsafsda");
        }else{
            echo "no";
        }
        return "creo la carpeta correctamente";
    }
}
