<?php

use Illuminate\Database\Seeder;
use App\Campeonato;
use App\Coche;
use Illuminate\Support\Str as Str;

class CampeonatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $campeonato = Campeonato::create([
            'id' => 1,
            'nombre' => 'Torneo LABSK por Escuderias Verano 2020',
            'tipo' => '2',
            'num_coches' => '6',
            'num_carreras' => '6',
            'num_vueltas' => '12',
            'slug' => Str::slug('Torneo LABSK por Escuderias Verano 2020'),
            'pilotos' => false,
            'escuderias' => true,
            'punto_escuderia_id' => 4,
            'descripcion' => 'Primer torneo por escuderias para usuarios de LaBSK',
            'punto_id' => 2,
        ]);


        // Carreras

        for ($i = 1; $i < 7; $i++) {

            if ($i == 3) {
                $campeonato->setCarrera(App\Circuito::find($i), $i, $i);
            } else {
                $campeonato->setCarrera(App\Circuito::find($i), $i);
            }
        }


        //Inscripciones
        $participantes = App\Participante::all()->where('id', '<', '13')->shuffle();
        $coches = Coche::all()->shuffle();

        //$escuderias = App\Escuderia::all()->shuffle();
        for ($i = 0; $i < $participantes->count(); $i++) {

            $escuderia = App\Escuderia::all()->random();
            $campeonato->inscribir($participantes[$i], $escuderia, null, Coche::all()->shuffle()->first());
        }

        //Resultados
        $posiciones = range(1, 6);
        for ($j = 0; $j < 6; $j++) { //carreras

            shuffle($posiciones);
            for ($i = 0; $i < 6; $i++) { //resultados
                $campeonato->carreras()->get()[$j]->setResultado($participantes[$i], $posiciones[$i], 0, 1);
            }
        }



        /* -------------- Torneo 2 --------------------*/

        $campeonato = Campeonato::create([
            'id' => 2,
            'nombre' => 'Campeonato pilotos Verano 2020',
            'tipo' => '1',
            'num_coches' => '6',
            'num_carreras' => '5',
            'num_vueltas' => '12',
            'slug' => Str::slug('Campeonato pilotos Verano 2020'),
            'pilotos' => true,
            'escuderias' => true,
            'descripcion' => 'Bienvenido al campeonato veraniego de 2020. Un campeonato individual donde podrás elegir que piloto ocupará tu monoplaza y a que escudería pertenece. Escoge sabiamente',
            'punto_id' => 1,
        ]);



        //Carreras
        for ($i = 1; $i < 7; $i++) {

            $campeonato->setCarrera(App\Circuito::find($i), $i);
        }
    }
}