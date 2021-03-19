<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pruebas = [
            [ 'descripcion' => '100 ML' ],
            [ 'descripcion' => '100 MV' ],
            [ 'descripcion' => '1000 ML' ],
            [ 'descripcion' => '1000 OBST' ],
            [ 'descripcion' => '10000 ML' ],
            [ 'descripcion' => '10KM MARCHA' ],
            [ 'descripcion' => '110 MV' ],
            [ 'descripcion' => '150 ML' ],
            [ 'descripcion' => '1500 ML' ],
            [ 'descripcion' => '1500 OBST' ],
            [ 'descripcion' => '200 ML' ],
            [ 'descripcion' => '2000 ML' ],
            [ 'descripcion' => '2000 OBST' ],
            [ 'descripcion' => '220 MV' ],
            [ 'descripcion' => '300 ML' ],
            [ 'descripcion' => '300 MV' ],
            [ 'descripcion' => '3000 ML' ],
            [ 'descripcion' => '3000 OBST' ],
            [ 'descripcion' => '3KM MARCHA' ],
            [ 'descripcion' => '400 ML' ],
            [ 'descripcion' => '400 MV' ],
            [ 'descripcion' => '4x100' ],
            [ 'descripcion' => '4x400' ],
            [ 'descripcion' => '4x50' ],
            [ 'descripcion' => '4x60' ],
            [ 'descripcion' => '4x80' ],
            [ 'descripcion' => '50 ML' ],
            [ 'descripcion' => '500 ML' ],
            [ 'descripcion' => '5000 ML' ],
            [ 'descripcion' => '5KM MARCHA' ],
            [ 'descripcion' => '60 ML' ],
            [ 'descripcion' => '60 MV' ],
            [ 'descripcion' => '600 ML' ],
            [ 'descripcion' => '80 ML' ],
            [ 'descripcion' => '80 MV' ],
            [ 'descripcion' => '800 ML' ],
            [ 'descripcion' => 'ALTURA' ],
            [ 'descripcion' => 'COMBINADAS' ],
            [ 'descripcion' => 'DISCO' ],
            [ 'descripcion' => 'JABALINA' ],
            [ 'descripcion' => 'LONGITUD' ],
            [ 'descripcion' => 'MARTILLO' ],
            [ 'descripcion' => 'O' ],
            [ 'descripcion' => 'PESO' ],
            [ 'descripcion' => 'S.PERTIGA' ],
            [ 'descripcion' => 'TRIPLE' ],
        ];

        DB::table('pruebas')->insert($pruebas);
    }
}
