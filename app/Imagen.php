<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table="imagens";
    public  $timestamps=false;
    protected $fillable =[
        'ruta_imagen',
        'user_id' ,
        'documento_id' ,
    ];
    public function documentos(){
        return $this->belongsTo('App\Documento');
    }
    public function users(){
        return $this->belongsTo('App\User');
    }
}
