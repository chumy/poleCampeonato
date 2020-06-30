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
            'nombre' => 'Silverstone',
        ]);

        Circuito::create([
            'nombre' => 'Montmelo',
        ]);
        Circuito::create([
            'nombre' => 'Shanghai',
        ]);
        Circuito::create([
            'nombre' => 'Interlagos',
        ]);
        Circuito::create([
            'nombre' => 'Circuito 5',
        ]);

        Circuito::create([
            'nombre' => 'Circuito 6',
        ]);
    }
}