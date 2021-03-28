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
            $table->integer('temporada_id_temporada')->unsigned();
            $table->foreign('temporada_id_temporada')->references('id_temporada')->on('temporadas');
            $table->integer('licencia_id_licencia')->unsigned();
            $table->foreign('licencia_id_licencia')->references('id_licencia')->on('licencias');
            $table->integer('categoria_id_categoria')->unsigned();
            $table->foreign('categoria_id_categoria')->references('id_categoria')->on('categorias');
            $table->integer('club_id_club')->unsigned();
            $table->foreign('club_id_club')->references('id_club')->on('clubs');
            $table->integer('dorsal')->nullable(false);
            $table->tinyInteger('revisado')->nullable(false);
            $table->tinyInteger('renovado')->nullable(false)->default(0);
            $table->unique(['temporada_id_temporada', 'licencia_id_licencia'], 'licencias_temporada_id_temporada_id_licencia_unique');
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
