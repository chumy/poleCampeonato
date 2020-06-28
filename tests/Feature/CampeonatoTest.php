<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampeonatoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function principal()
    {
        $uri = '/campeonato/1';
        $response = $this->get('/campeonato');

        $response->assertRedirect($uri);
    }

    /** @test */
    public function estructura()
    {
        $uri = '/campeonato/1';
        $response = $this->get($uri);

        $response->assertStatus(200)
            ->assertSee('Campeonato');
    }
}