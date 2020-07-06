<?php

use App\Campeonato;
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
        //
        // Campeonato 1

        $campeonato = Campeonato::find(1);

        for ($i = 1; $i < 7; $i++) {

            if ($i == 3) {
                $campeonato->setCarrera(App\Circuito::find($i), $i, $i);
            } else {
                $campeonato->setCarrera(App\Circuito::find($i), $i);
            }
        }
    }
}