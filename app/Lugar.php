<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table="lugars";
    public  $timestamps=false;
    protected $fillable =[
        'id_ubicacion' ,
        'nombre_lugar' ,
        'tipo_lugar',
    ];


    public function user(){
        return $this->hasMany('App\User');
    }
}
