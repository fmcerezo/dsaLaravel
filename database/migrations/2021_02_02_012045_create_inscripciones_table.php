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
            $table->integer('control_id_control')->unsigned();
            $table->foreign('control_id_control')->references('id_control')->on('controles');
            $table->integer('licencia_id_licencia')->unsigned();
            $table->foreign('licencia_id_licencia')->references('id_licencia')->on('licencias');
            $table->integer('prueba_id_prueba')->unsigned();
            $table->foreign('prueba_id_prueba')->references('id_prueba')->on('pruebas');
            $table->float('marca')->nullable(false);
            $table->unique(['control_id_control', 'licencia_id_licencia', 'prueba_id_prueba'], 'inscripciones_id_control_id_licencia_id_prueba_unique');
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
