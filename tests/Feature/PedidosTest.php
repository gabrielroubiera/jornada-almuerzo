<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pedir_plato()
    {
        $response = $this->get('api/pedir/plato');

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
    }
}
