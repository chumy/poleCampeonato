<?php

use Illuminate\Database\Seeder;

class InscritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $campeonato = App\Campeonato::find(1);

        //Inscripciones
        $participantes = App\Participante::all()->where('id', '<', '13')->shuffle();
        //$escuderias = App\Escuderia::all()->shuffle();
        for ($i = 0; $i < $participantes->count(); $i++) {
            $escuderia = App\Escuderia::all()->random();
            $campeonato->inscribir($participantes[$i], $escuderia);
        }
    }
}