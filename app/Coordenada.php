<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    protected $table="coordenadas";
    public  $timestamps=false;
    protected $fillable = [
        'latitud', 'longitud',
    ];
    public function user(){
        return $this->hasMany('App\User');
    }
}
