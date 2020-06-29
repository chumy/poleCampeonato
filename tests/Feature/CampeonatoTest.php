<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Campeonato;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CampeonatoTest extends TestCase
{
    //use DatabaseMigrations;

    /* public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }*/
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

    public function creacion_campeonato()
    {
        $uri = '/campeonato/1';
        $response = $this->get($uri);

        $response->assertStatus(200)
            ->assertSee('Campeonato');
    }
}