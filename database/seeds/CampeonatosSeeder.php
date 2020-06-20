<?php

use Illuminate\Database\Seeder;
use App\Campeonato;

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
            'id' =>1,
            'nombre' => 'Torneo LABSK por Escuderias Verano 2020',
            'tipo' =>'2',
            'coches' =>'6',
            'carreras' =>'6',
            'vueltas' =>'12',
            'pilotos' =>false,
            'escuderias' =>true,
            'punto_escuderia_id' => 4,
            'descripcion' => 'Primer torneo por escuderias para usuarios de LaBSK',
            'punto_id'=> 2,
        ]);

        for ($i=1; $i < 13; $i++)
        {
            $campeonato->participantes()
                        ->attach(App\Participante::find($i), [ 'escuderia_id'=> ($i % 6) + 1 ]);
        }

        for ($i=1; $i < 7; $i++)
        {
           
            $punto = ($i<6) ? 2 : 3;
            $campeonato->carreras()->attach(App\Carrera::find($i),['orden'=>$i, 'punto_id'=>$punto]); 

            //$campeonato->participantes()->attach(App\Participante::find($i));
        
           /* $campeonato->participantes()
                                    ->attach(App\Participante::find($i), [ 'escuderia_id'=> $i  ]);*/

            $posiciones= range(1,12);
            shuffle($posiciones);
            for($j=0; $j<sizeof($posiciones); $j++)
            {
                $participacion =  ($posiciones[$j] < 7) ? 1 : 0;
                App\Participante::find($j+1)
                            ->carreras()
                            ->attach(App\Carrera::find($i),
                                ["posicion"=> $posiciones[$j], "campeonato_id"=>1, "participacion"=> $participacion]);
            
            }
        }

        /* -------------- Torneo 2 --------------------*/
   
        $campeonato = Campeonato::create([
            'id' =>2,
            'nombre' => 'Campeonato pilotos Verano 2020',
            'tipo' =>'1',
            'coches' =>'6',
            'carreras' =>'5',
            'vueltas' =>'12',
            'pilotos' =>true,
            'escuderias' =>true,
            'descripcion' => 'Bienvenido al campeonato veraniego de 2020. Un campeonato individual donde podrás elegir que piloto ocupará tu monoplaza y a que escudería pertenece. Escoge sabiamente',
            'punto_id'=> 1,
        ]);

        for ($i=1; $i < 6; $i++)
        {
            //$escuderias=App\Escuderias::all();
            $campeonato->carreras()->attach(App\Carrera::find($i),['orden'=>$i, 'punto_id'=>1]); 
            $campeonato->participantes()
                                    ->attach(App\Participante::find($i), [ 'escuderia_id'=> $i  ]);
            $posiciones= range(1,6);
            shuffle($posiciones);
            for($j=0; $j<sizeof($posiciones); $j++)
            {
                App\Participante::find($j+1)
                            ->carreras()
                            ->attach(App\Carrera::find($i),
                                ["posicion"=> $posiciones[$j], "campeonato_id"=>2]);
            
            }
        }
   



    }
}