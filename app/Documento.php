<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table="documentos";
    public  $timestamps=false;
    protected $fillable =[
        'nombre_documento',
        'nombre_persona' ,
        'apellido_persona' ,
        'tipo_documento',
        'user_id',
        'publicacion_id',
    ];

    public function insertar($nombre_documento,$nombre_persona,$apellido_persona,$tipo_documento){
        $this->nombre_documento=$nombre_documento;
        $this->nombre_persona=$nombre_persona;
        $this->apellido_persona=$apellido_persona;
        $this->tipo_documento=$tipo_documento;
        $this->save();
    }
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function publicacions(){
        return $this->belongsTo('App\Publicacion');
    }
    public function imagens(){
        return $this->hasMany('App\Imagen');
    }
}
