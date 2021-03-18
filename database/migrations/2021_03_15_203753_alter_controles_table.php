<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controles', function(Blueprint $table) {
            $table->renameColumn('id_temporada', 'temporada_id_temporada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controles', function(Blueprint $table) {
            $table->renameColumn('temporada_id_temporada', 'id_temporada');
        });
    }
}
