<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lugar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ubicacion')->nullable();
            $table->string('nombre_lugar');
            $table->enum('tipo_lugar',['DEPARTAMENTO','MUNICIPIO']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lugars');
    }
}
