<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusSeeder::class);
        $this->call(StatusPedidosSeeder::class);
        $this->call(BodegaSeeder::class);
        $this->call(RecetasSeeder::class);
        $this->call(IngredientesRecetasSeeder::class);
    }
}
