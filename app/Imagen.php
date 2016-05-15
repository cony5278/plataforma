<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table="imagens";
    public  $timestamps=false;
    protected $fillable =[
        'nombre_imagen',
        'documento_id' ,
    ];

}
