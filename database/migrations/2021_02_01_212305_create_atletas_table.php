<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->integer('id_atleta')->unsigned();
            $table->primary('id_atleta');
            $table->string('nombre', 100)->nullable(false);
            $table->string('apellidos', 100)->nullable(false);
            $table->integer('ano_nacimiento')->nullable(false);
            $table->string('sexo', 1)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('clave', 50)->nullable(false);
            $table->string('dni', 9)->nullable(false)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atletas');
    }
}
