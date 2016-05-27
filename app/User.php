<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public  $timestamps=false;
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function actualizarNombre($nombre){
        $consulta=$this->find(Auth::user()->id);
        $consulta->name=$nombre;
        $consulta->save();
    }
    public function actualizarApellido($apellido){
        $consulta=$this->find(Auth::user()->id);
        $consulta->last_name=$apellido;
        $consulta->save();
    }
    public function actualizarNombreUsuario($nombre_usuario){
        $consulta=$this->find(Auth::user()->id);
        $consulta->nombre_usuario=$nombre_usuario;
        $consulta->save();
    }
    public function actualizarCorreo($correo){
        $consulta=$this->find(Auth::user()->id);
        $consulta->email=$correo;
        $consulta->save();
    }
    public function actualizarCoordenadas($latitud,$longitud,$nombre){

        $lugar=Lugar::where("nombre_lugar","LIKE","%".trim($nombre)."%")->first();
        $consulta=$this->find(Auth::user()->id);
        $coordenadas=null;
        if(is_null($consulta->coordenada_id))
            $coordenadas= Coordenada::create([
                "latitud"=>$latitud,
                "longitud"=>$longitud,
            ]);
        else
            $coordenadas=Coordenada::where("id",$consulta->coordenada_id)->first();
        $consulta->lugar_id=$lugar->id;
        $consulta->coordenada_id=$coordenadas->id;
        $consulta->save();
    }

    public function publicacion(){
        return $this->hasMany('App\Publicacion');
    }
    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }
    public function coordenada(){
        return $this->belongsTo('App\Coordenada');
    }
    public function lugar(){
        return $this->belongsTo('App\Lugar');
    }

}
