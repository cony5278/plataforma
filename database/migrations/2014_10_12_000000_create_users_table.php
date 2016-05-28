<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('nombre_usuario');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen_usuario');
            $table->rememberToken();
            $table->integer('lugar_id')->nullable()->unsigned();//es de un usuario la publicacio a laque va dirigida la notificacion
            $table->foreign('lugar_id')->references('id')->on('lugars')->onDelete('cascade');
            $table->integer('coordenada_id')->nullable()->unsigned();//es de un usuario la publicacio a laque va dirigida la notificacion
            $table->foreign('coordenada_id')->references('id')->on('coordenadas')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
