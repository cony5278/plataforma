<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eDocumento extends Model
{
    protected $table="documentos";
    public  $timestamps=false;
    protected $fillable =[
        'nombre_documento',
        'nombre_persona' ,
        'apellido_persona' ,
        'tipo_documento',
//        'user_id',
//        'publicacion_id',];
    ];
    public function insertar($nombre_documento,$nombre_persona,$apellido_persona,$tipo_documento){
        $this->nombre_documento=$nombre_documento;
        $this->nombre_persona=$nombre_persona;
        $this->apellido_persona=$apellido_persona;
        $this->tipo_documento=$tipo_documento;
        $this->save();
    }
}
