<?php

use Illuminate\Database\Seeder;

class StatusPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pedidos')->delete();

        $data = [
            ['id' => 1, 'nombre' => 'en cola', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nombre' => 'preparando', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nombre' => 'preparado', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'nombre' => 'no preparado', 'status_id' => 1, 'created_at' => \Carbon\Carbon::now()]
        ];

        DB::table('status_pedidos')->insert($data);
    }
}
