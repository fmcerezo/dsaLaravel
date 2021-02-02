<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id_inscripcion');
            $table->integer('id_control')->unsigned();
            $table->foreign('id_control')->references('id_control')->on('controles');
            $table->integer('id_licencia')->unsigned();
            $table->foreign('id_licencia')->references('id_licencia')->on('licencias');
            $table->integer('id_prueba')->unsigned();
            $table->foreign('id_prueba')->references('id_prueba')->on('pruebas');
            $table->float('marca')->nullable(false);
            $table->unique(['id_control', 'id_licencia', 'id_prueba']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
