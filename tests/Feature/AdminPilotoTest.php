<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Piloto;

class AdminPilotoTest extends TestCase
{
    use RefreshDatabase;

    public function circuito1()
    {
        return Piloto::create(['nombre' => 'Piloto Test', 'visible' => 1, 'descripcion' => 'Descripcion piloto test']);
    }

    /** @test */
    public function acceso()
    {
        $response = $this->get('/admin/pilotos/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function listado()
    {
        $circuito = $this->circuito1();
        $response = $this->get('/admin/pilotos/create');

        $response->assertSee('Piloto Test');
    }

    /** @test */
    public function creacion_circuito()
    {
        $this->post('/admin/pilotos/', [
            'nombre' => 'Piloto2',
        ])->assertRedirect('/admin/pilotos/create')
            ->assertSee('Piloto2');
    }
}