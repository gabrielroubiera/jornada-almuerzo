<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();

        $data = [
            ['id' => 1, 'nombre' => 'activo', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nombre' => 'inactivo', 'created_at' => \Carbon\Carbon::now()]
        ];

        DB::table('status')->insert($data);
    }
}
