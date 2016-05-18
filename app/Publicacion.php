<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table="publicacions";
    public  $timestamps=false;
    protected $fillable =[
        'descripcion_publicacion',
        'fecha_hora_publicacion',
    ];


    public function documento(){
        return $this->hasMany('App\Documento');
    }
}
