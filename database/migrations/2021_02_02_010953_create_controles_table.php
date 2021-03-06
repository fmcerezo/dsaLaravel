<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles', function (Blueprint $table) {
            $table->increments('id_control');
            $table->integer('temporada_id_temporada')->unsigned();
            $table->foreign('temporada_id_temporada')->references('id_temporada')->on('temporadas');
            $table->date('fecha_celebracion')->nullable(false);
            $table->date('fecha_fin_inscripcion')->nullable(false);
            $table->string('descripcion', 100)->nullable(false);
            $table->tinyInteger('activo')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controles');
    }
}
