<?php

use Illuminate\Database\Seeder;
use App\Participante;

class ParticipantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Participante::create([
            'nombre' => 'Zoste',
            'apodo' =>'Zoste',
        ]);
        Participante::create([
            'nombre' => 'Turlusiflu',
            'apodo' =>'Turlusiflu',
        ]);
        Participante::create([
            'nombre' => 'Jose Joaquin',
            'apodo' =>'Jose Joaquin',
        ]);
        Participante::create([
            'nombre' => 'Deporobom',
            'apodo' =>'Deporobom',
        ]);
        Participante::create([
            'nombre' => 'Sergi',
            'apodo' =>'Sergi',
        ]);
        Participante::create([
            'nombre' => 'Marco Antonio',
            'apodo' =>'Marco Antonio',
        ]);
        Participante::create([
            'nombre' => 'Chumy',
            'apodo' =>'Chumy',
        ]);
        Participante::create([
            'nombre' => 'Enric',
            'apodo' =>'Enric',
        ]);

        Participante::create([
            'nombre' => 'SaLaS',
            'apodo' =>'SaLaS',
        ]);

        Participante::create([
            'nombre' => 'Isaias',
            'apodo' =>'Isaias',
        ]);

        Participante::create([
            'nombre' => 'Rewind Masters',
            'apodo' =>'Rewind Masters',
        ]);

        Participante::create([
            'nombre' => 'Prebosting',
            'apodo' =>'Prebosting',
        ]);

         Participante::create([
            'nombre' => 'Zoste - Turlusiflu',
            'apodo' =>'Zoste - Turlusiflu',
        ]);

        Participante::create([
            'nombre' => 'Enric - Chumy',
            'apodo' =>'Enric - Chumy',
        ]);

        Participante::create([
            'nombre' => 'Jenaru - Marco Antonio',
            'apodo' =>'Jenaru - Marco Antonio',
        ]);

        Participante::create([
            'nombre' => 'Deporobom - Isaías',
            'apodo' =>'Deporobom - Isaías',
        ]);

         Participante::create([
            'nombre' => 'Jose Joaquin - Rewind Masters',
            'apodo' =>'Jose Joaquin - Rewind Masters',
        ]);

        Participante::create([
            'nombre' => 'Sergi - Salas',
            'apodo' =>'Sergi - Salas',
        ]);


    }
}