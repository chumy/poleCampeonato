<?php

use App\Circuito;
use Illuminate\Database\Seeder;

class CircuitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Circuito::create([
            'nombre' => 'Circuito 1',
            'visible' => true,
        ]);
        
        Circuito::create([
            'nombre' => 'Circuito 2',
            'visible' => true,
        ]);
        Circuito::create([
            'nombre' => 'Circuito 3',
            'visible' => true,
        ]);
        Circuito::create([
            'nombre' => 'Circuito 4',
            'visible' => true,
        ]);
        Circuito::create([
            'nombre' => 'Circuito 5',
            'visible' => true,
        ]);

        Circuito::create([
            'nombre' => 'Circuito 6',
            'visible' => true,
        ]);
    }
}