<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bodega')->delete();

        $data = [
            ['id' => 1, 'ingrediente' => 'tomato', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'ingrediente' => 'lemon', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'ingrediente' => 'potato', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'ingrediente' => 'rice', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'ingrediente' => 'ketchup', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'ingrediente' => 'lettuce', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 7, 'ingrediente' => 'onion', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 8, 'ingrediente' => 'cheese', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 9, 'ingrediente' => 'meat', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 10, 'ingrediente' => 'chicken', 'cantidad' => '5', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
        ];

        DB::table('bodega')->insert($data);
    }
}
