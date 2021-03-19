<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [ 'nombre' => 'Promesa', 'edad_fin_categoria' => 22 ],
            [ 'nombre' => 'Junior', 'edad_fin_categoria' => 19 ],
            [ 'nombre' => 'Juvenil', 'edad_fin_categoria' => 17 ],
            [ 'nombre' => 'Cadete', 'edad_fin_categoria' => 15 ],
            [ 'nombre' => 'Infantil', 'edad_fin_categoria' => 13 ],
            [ 'nombre' => 'Alevin', 'edad_fin_categoria' => 11 ],
            [ 'nombre' => 'Senior', 'edad_fin_categoria' => 35 ],
            [ 'nombre' => 'Veterano', 'edad_fin_categoria' => 1000 ],

        ];

        DB::table('categorias')->insert($categorias);
    }
}
