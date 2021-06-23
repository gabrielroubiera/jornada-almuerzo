<?php

use Illuminate\Database\Seeder;

class IngredientesRecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredientes_recetas')->delete();

        $data = [
            ['id' => 1, 'ingrediente' => 'rice', 'cantidad' => '2', 'receta_id' => '1', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'ingrediente' => 'tomato', 'cantidad' => '1', 'receta_id' => '1', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'ingrediente' => 'chicken', 'cantidad' => '1', 'receta_id' => '1', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],

            ['id' => 4, 'ingrediente' => 'potato', 'cantidad' => '2', 'receta_id' => '2', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'ingrediente' => 'onion', 'cantidad' => '1', 'receta_id' => '2', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'ingrediente' => 'meat', 'cantidad' => '1', 'receta_id' => '2', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],

            ['id' => 7, 'ingrediente' => 'potato', 'cantidad' => '1', 'receta_id' => '3', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 8, 'ingrediente' => 'onion', 'cantidad' => '1', 'receta_id' => '3', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 9, 'ingrediente' => 'cheese', 'cantidad' => '1', 'receta_id' => '3', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],

            ['id' => 10, 'ingrediente' => 'meat', 'cantidad' => '2', 'receta_id' => '4', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 11, 'ingrediente' => 'lettuce', 'cantidad' => '1', 'receta_id' => '4', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 12, 'ingrediente' => 'lemon', 'cantidad' => '1', 'receta_id' => '4', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 13, 'ingrediente' => 'onion', 'cantidad' => '1', 'receta_id' => '4', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 14, 'ingrediente' => 'tomato', 'cantidad' => '1', 'receta_id' => '4', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],

            ['id' => 15, 'ingrediente' => 'potato', 'cantidad' => '2', 'receta_id' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 16, 'ingrediente' => 'meat', 'cantidad' => '1', 'receta_id' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 17, 'ingrediente' => 'ketchup', 'cantidad' => '1', 'receta_id' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],

            ['id' => 18, 'ingrediente' => 'chicken', 'cantidad' => '2', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 20, 'ingrediente' => 'rice', 'cantidad' => '2', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 21, 'ingrediente' => 'tomato', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 22, 'ingrediente' => 'lettuce', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 23, 'ingrediente' => 'onion', 'cantidad' => '2', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 24, 'ingrediente' => 'lemon', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 25, 'ingrediente' => 'potato', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 26, 'ingrediente' => 'meat', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 27, 'ingrediente' => 'ketchup', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 28, 'ingrediente' => 'cheese', 'cantidad' => '1', 'receta_id' => '6', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()]
        ];

        DB::table('ingredientes_recetas')->insert($data);
    }
}
