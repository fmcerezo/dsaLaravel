<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporadaImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporada_imagenes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_temporada')->unsigned();
            $table->foreign('id_temporada')->references('id_temporada')->on('temporadas');
            $table->string('title', 250)->default('');
            $table->string('path', 250);
            $table->boolean('main')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporada_imagenes');
    }
}
