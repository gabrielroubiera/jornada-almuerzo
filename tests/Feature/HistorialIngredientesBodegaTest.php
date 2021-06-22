<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HistorialIngredientesBodegaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->getJson('api/historial/ingredientes/bodega');

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
    }
}
