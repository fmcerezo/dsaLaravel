<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_imagenes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_control')->unsigned();
            $table->foreign('id_control')->references('id_control')->on('controles');
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
        Schema::dropIfExists('control_imagenes');
    }
}
