<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_documento');
            $table->string('nombre_persona');
            $table->string('apellido_persona');
            $table->enum('tipo_documento',['tarjeta_credito','tarjeta_debito','carnet_estudiantil',
            'carnet_eps','libreta_militar','pasaporte','visa','tarjeta_profesional','pase','licencia_conduccion','otro']);
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('publicacion_id')->nullable()->unsigned();
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
        Schema::drop('documentos');
    }
}
