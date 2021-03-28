<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administradores = [
            [ 'login' => 'admin', 'clave' => '1234' ],
        ];

        DB::table('administradores')->insert($administradores);
    }
}
