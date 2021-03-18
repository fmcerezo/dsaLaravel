<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDateFieldsControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->date('fecha_celebracion')->nullable(false)->change();
            $table->date('fecha_fin_inscripcion')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controles', function (Blueprint $table) {
            $table->dateTime('fecha_celebracion')->nullable(false)->change();
            $table->dateTime('fecha_fin_inscripcion')->nullable(false)->change();
        });
    }
}
