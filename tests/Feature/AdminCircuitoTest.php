<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Circuito;

class AdminCircuitoTest extends TestCase
{
    use RefreshDatabase;

    public function circuito1()
    {
        return Circuito::create(['nombre' => 'Circuito Test']);
    }

    /** @test */
    public function acceso()
    {
        $response = $this->get('/admin/circuitos/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function listado()
    {
        $circuito = $this->circuito1();
        $response = $this->get('/admin/circuitos/create');

        $response->assertSee('Circuito Test');
    }

    /** @test */
    public function creacion_circuito()
    {
        $this->post('/admin/circuitos/', [
            'nombre' => 'Circtuito Test 2',
        ])->assertRedirect('/admin/circuitos/create');
    }
}