<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_publicacion');
            $table->string('descripcion_publicacion');
            $table->dateTime('fecha_hora_publicacion');
            $table->integer('user_id')->unsigned();//es de un usuario la publicacio a laque va dirigida la notificacion
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publicacions');
    }
}
