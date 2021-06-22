<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetas')->delete();

        $data = [
            ['id' => 1, 'nombre' => 'Arroz con Pollo', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nombre' => 'Papas con Carne', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nombre' => 'Papas con Queso', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'nombre' => 'Ensalada con Carne', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'nombre' => 'Papas fritas con Carne', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'nombre' => 'Pollo horneado con arroz y Ensalada con carne', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()]
        ];

        DB::table('recetas')->insert($data);
    }
}
