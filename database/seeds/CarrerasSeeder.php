<?php

use App\Carrera;
use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Carrera::class)->create([
            'nombre' => 'Circuito 1',
            'visible' => true,
        ]);
        
        factory(Carrera::class)->create([
            'nombre' => 'Circuito 2',
            'visible' => true,
        ]);
        factory(Carrera::class)->create([
            'nombre' => 'Circuito 3',
            'visible' => true,
        ]);
        factory(Carrera::class)->create([
            'nombre' => 'Circuito 4',
            'visible' => true,
        ]);
        factory(Carrera::class)->create([
            'nombre' => 'Circuito 5',
            'visible' => true,
        ]);

        factory(Carrera::class)->create([
            'nombre' => 'Circuito 6',
            'visible' => true,
        ]);
    }
}