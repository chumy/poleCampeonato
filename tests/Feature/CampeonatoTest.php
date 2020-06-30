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
    use RefreshDatabase;


    /** Seeders */

    public function campeonato1()
    {
        $campeonato = Campeonato::create([
            'nombre' => 'Torneo LABSK por Escuderias Verano 2020',
            'tipo' => '2',
            'num_coches' => '6',
            'num_carreras' => '6',
            'num_vueltas' => '12',
            'pilotos' => 0,
            'escuderias' => 1,
            'punto_escuderia_id' => 4,
            'descripcion' => 'Primer torneo por escuderias para usuarios de LaBSK',
            'punto_id' => 2,
        ]);

        $this->artisan('db:seed', ['--class' => 'PuntosSeeder']);

        //$campeonato = Campeonato::find(1);
        return $campeonato;
    }

    public function newCampeonato()
    {
        $campeonato = Campeonato::create([
            'nombre' => 'Torneo para test',
            'tipo' => '2',
            'num_coches' => '6',
            'num_carreras' => '6',
            'num_vueltas' => '12',
            'pilotos' => 0,
            'escuderias' => 1,
            'punto_escuderia_id' => 4,
            'descripcion' => 'Descripcion de test',
            'punto_id' => 2,
        ]);

        return $campeonato;
    }

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
        $campeonato = $this->campeonato1();

        $uri = '/campeonato/' . $campeonato->id;
        $response = $this->get('/campeonato');

        $response->assertRedirect($uri);
    }

    /** @test */
    public function estructura()
    {
        $campeonato = $this->campeonato1();

        $uri = '/campeonato/' . $campeonato->id;

        $response = $this->get($uri);

        $response->assertSee('Campeonato');
    }

    /** @test */
    public function descripcion_general()
    {
        $campeonato = $this->campeonato1();

        $uri = '/campeonato/' . $campeonato->id;

        $response = $this->get($uri);

        $response->assertSee($campeonato->nombre)
            ->assertSee($campeonato->descripcion)
            ->assertSeeTextInOrder([
                'Número de coches', $campeonato->num_coches,
                'Número de carreras', $campeonato->num_carreras,
                'Vueltas por carreras', $campeonato->num_vueltas,
                'Penalización por abandono',
                'Pilotos',
                'Escuderias',
                'Puntuación', $campeonato->puntuaciones->toText(),
            ]);
    }

    /** @test */
    public function puntuacion_escuderias()
    {
        $campeonato = $this->campeonato1();

        $uri = '/campeonato/' . $campeonato->id;

        $response = $this->get($uri);

        $response->assertSee($campeonato->nombre)
            ->assertSee($campeonato->descripcion)
            ->assertSeeTextInOrder([
                'Número de coches', $campeonato->num_coches,
                'Número de carreras', $campeonato->num_carreras,
                'Vueltas por carreras', $campeonato->num_vueltas,
                'Penalización por abandono',
                'Pilotos',
                'Escuderias',
                'Puntuación', $campeonato->puntuaciones->toText(),
                'Puntuación de Escuderías', $campeonato->getPuntuacionesEscuderias->toText(),
            ]);
    }

    /** @ */
    public function carreras_puntuaciones_especiales()
    {
        $campeonato = $this->campeonato1();

        $uri = '/campeonato/' . $campeonato->id;

        $response = $this->get($uri);

        $response->assertSee($campeonato->nombre)
            ->assertSee($campeonato->descripcion)
            ->assertSeeTextInOrder([
                'Número de coches', $campeonato->num_coches,
                'Número de carreras', $campeonato->num_carreras,
                'Vueltas por carreras', $campeonato->num_vueltas,
                'Penalización por abandono',
                'Pilotos',
                'Escuderias',
                'Puntuación', $campeonato->puntuaciones->toText(),
            ]);
    }
}