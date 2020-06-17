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
            'nombre' => 'Torneo LABSK por Escuderias Verano 2020',
            'tipo' =>'1',
            'coches' =>'6',
            'carreras' =>'6',
            'vueltas' =>'12',
            'pilotos' =>false,
            'escuderias' =>true,
            'escuderia1' =>10,
            'escuderia2'=>5,
            'escuderia3'=>3,
            'descripcion' => 'Primer torneo por escuderias para usuarios de LaBSK',
            'punto_id'=> 1,
        ]);

        for ($i=1; $i < 7; $i++)
        {
           
            $campeonato->carreras()->attach(App\Carrera::find($i),['orden'=>$i]); 
            $campeonato->participantes()->attach(App\Participante::find($i));
            $posiciones= range(1,6);
            shuffle($posiciones);
            for($j=0; $j<sizeof($posiciones); $j++)
            {
                App\Participante::find($j+1)
                            ->carreras()
                            ->attach(App\Carrera::find($i),
                                ["posicion"=> $posiciones[$j], "campeonato_id"=>1]);
            
            }
        }
   
    }
}