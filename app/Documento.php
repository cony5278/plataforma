<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table="documentos";
    public  $timestamps=false;
    protected $fillable =[
        'nombre_persona' ,
        'numero_documento' ,
        'tipo_documento',
        'user_id',
        'publicacion_id',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function publicacion(){
        return $this->belongsTo('App\Publicacion');
    }
    public function imagen(){
        return $this->hasMany('App\Imagen');
    }
}
