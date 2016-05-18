<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notificacions',function(Blueprint $table){
          $table->increments('id');
          $table->integer('sugerir_notificacion');//entero que redireccionara al usuario.
          $table->integer('quien_sugirio_notificacion');//usuario quien sugirio de quieneran los papeles
          $table->integer('usuario_notificacion');//usuario que dio click en el boton mio
          $table->integer('user_id')->unsigned();//es de un usuario la publicacio a laque va dirigida la notificacion
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->integer('publicacion_id')->unsigned();//es de un usuario la publicacio a laque va dirigida la notificacion
          $table->foreign('publicacion_id')->references('id')->on('publicacions')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
