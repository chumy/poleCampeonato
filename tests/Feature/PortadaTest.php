<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PortadaTest extends TestCase
{
    /** @test */
    public function existe()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function secciones()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Campeonatos')
            ->assertSee('Pilotos')
            ->assertSee('Escuderias');
    }
}