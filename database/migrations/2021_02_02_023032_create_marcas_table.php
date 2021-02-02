<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->increments('id_marca');
            $table->integer('id_temporada')->unsigned();
            $table->foreign('id_temporada')->references('id_temporada')->on('temporadas');
            $table->integer('id_licencia')->unsigned();
            $table->foreign('id_licencia')->references('id_licencia')->on('licencias');
            $table->integer('id_prueba')->unsigned();
            $table->foreign('id_prueba')->references('id_prueba')->on('pruebas');
            $table->float('marca')->nullable(false);
            $table->float('viento')->nullable(false);
            $table->dateTime('fecha')->nullable(false);
            $table->string('lugar', 100)->nullable(false);
            $table->string('competicion', 100)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
