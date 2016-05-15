<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    if(Auth::check())
        return Redirect::to('usuario');
    else
        return view('general.general');
});

Route::get('usuario', function () {

    if(Auth::check())
        return view('general.general_usuario');
    else
        return Redirect::to('/');
});

Route::get('imagenes',function(){
    return view('pruebas.subir_archivo');
});
Route::get('usuario/documento/','ControladorArchivoImagenes@guardar');
Route::post('usuario/documento/','ControladorArchivoImagenes@guardar');

Route::get('usuario/documento/registrar','ControladorDocumento@registrar');
Route::post('usuario/documento/registrar','ControladorDocumento@registrar');

Route::get('usuario/registrar','Auth\AuthController@getRegister');
Route::post('usuario/registrar','Auth\AuthController@postRegister');
Route::get('usuario/sesion','Auth\AuthController@getLogin');
Route::post('usuario/sesion','Auth\AuthController@postLogin');

Route::get('usuario/cerrar/sesion',function() {
    if (Auth::check()) {

        Auth::logout();
        Session::flush();
    }

    return  Redirect::to('/');
});

