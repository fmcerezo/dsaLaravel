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
            $table->integer('control_id_control')->unsigned();
            $table->foreign('control_id_control')->references('id_control')->on('controles');
            $table->integer('prueba_id_prueba')->unsigned();
            $table->foreign('prueba_id_prueba')->references('id_prueba')->on('pruebas');
            $table->integer('categoria_id_categoria')->unsigned();
            $table->foreign('categoria_id_categoria')->references('id_categoria')->on('categorias');
            $table->string('sexo', 1)->nullable(false);
            $table->string('hora', 5)->nullable(false);
            $table->unique(['control_id_control', 'prueba_id_prueba', 'categoria_id_categoria', 'sexo'], 'pruebas_control_id_control_id_prueba_id_categoria_sexo_unique');
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
