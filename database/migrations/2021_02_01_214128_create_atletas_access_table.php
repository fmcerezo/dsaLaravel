<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletasAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas_access', function (Blueprint $table) {
            $table->increments('id_atleta');
            $table->string('licencia', 100)->nullable(false);
            $table->string('apellido', 100)->nullable(false);
            $table->string('nombre', 100)->nullable(false);
            $table->string('ano_sex', 3)->nullable(false);
            $table->string('club', 100)->nullable(false);
            $table->integer('dorsal')->nullable(false);
            $table->tinyInteger('participa')->nullable(false);
            $table->string('dni', 10)->nullable(false)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atletas_access');
    }
}
