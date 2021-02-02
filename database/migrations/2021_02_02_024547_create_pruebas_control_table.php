<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas_control', function (Blueprint $table) {
            $table->increments('id_prueba_control');
            $table->integer('id_control')->unsigned();
            $table->foreign('id_control')->references('id_control')->on('controles');
            $table->integer('id_prueba')->unsigned();
            $table->foreign('id_prueba')->references('id_prueba')->on('pruebas');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->string('sexo', 1)->nullable(false);
            $table->dateTime('hora')->nullable(false);
            $table->unique(['id_control', 'id_prueba', 'id_categoria', 'sexo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pruebas_control');
    }
}
