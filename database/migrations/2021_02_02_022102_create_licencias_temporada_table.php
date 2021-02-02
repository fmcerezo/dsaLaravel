<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTemporadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias_temporada', function (Blueprint $table) {
            $table->increments('id_licencia_temporada');
            $table->integer('id_temporada')->unsigned();
            $table->foreign('id_temporada')->references('id_temporada')->on('temporadas');
            $table->integer('id_licencia')->unsigned();
            $table->foreign('id_licencia')->references('id_licencia')->on('licencias');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->integer('id_club')->unsigned();
            $table->foreign('id_club')->references('id_club')->on('clubs');
            $table->integer('dorsal')->nullable(false);
            $table->tinyInteger('revisado')->nullable(false);
            $table->tinyInteger('renovado')->nullable(false)->default(0);
            $table->unique(['id_temporada', 'id_licencia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias_temporada');
    }
}
