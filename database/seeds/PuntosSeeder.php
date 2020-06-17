<?php

use Illuminate\Database\Seeder;
use App\Punto;
use App\ListaPunto;

class PuntosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Puntuacion Estandard	Ninguno	10-8-6-5-4-3
        $p1 = Punto::create([
            'id' =>1,
            'nombre' => 'Puntuacion Estandard',
        ]);
       

        //10-8-6-5-4-3

        ListaPunto::create([
            'posicion' => 1,
            'puntos' => 10,
            'punto_id' => 1,
        ]);

         ListaPunto::create([
            'posicion' => 2,
            'puntos' => 8,
            'punto_id' => 1,
        ]);

        ListaPunto::create([
            'posicion' => 3,
            'puntos' => 6,
            'punto_id' => 1,
        ]);

        ListaPunto::create([
            'posicion' => 4,
            'puntos' => 5,
            'punto_id' => 1,
        ]);

        ListaPunto::create([
            'posicion' => 5,
            'puntos' => 4,
            'punto_id' => 1,
        ]);

        ListaPunto::create([
            'posicion' => 6,
            'puntos' => 3,
            'punto_id' => 1,
        ]);

        //Puntuacion 2

         Punto::create([
             'id' =>2,
            'nombre' => 'Puntuacion Escuderias',
            'penalizacion' => '0.5',
        ]);


        ListaPunto::create([
            'posicion' => 1,
            'puntos' => 10,
            'punto_id' => 2,
        ]);

         ListaPunto::create([
            'posicion' => 2,
            'puntos' => 8,
            'punto_id' => 2,
        ]);

        ListaPunto::create([
            'posicion' => 3,
            'puntos' => 6,
            'punto_id' => 2,
        ]);

        ListaPunto::create([
            'posicion' => 4,
            'puntos' => 5,
            'punto_id' => 2,
        ]);

        ListaPunto::create([
            'posicion' => 5,
            'puntos' => 4,
            'punto_id' => 2,
        ]);

        ListaPunto::create([
            'posicion' => 6,
            'puntos' => 3,
            'punto_id' => 2,
        ]);


        // 15-12-10-8-6-5
            
         Punto::create([
             'id' =>3,
            'nombre' => 'Puntuacion Extra Escuderias',
            'penalizacion' => '0.5',
        ]);

        ListaPunto::create([
            'posicion' => 1,
            'puntos' => 15,
            'punto_id' => 3,
        ]);

         ListaPunto::create([
            'posicion' => 2,
            'puntos' => 12,
            'punto_id' => 3,
        ]);

        ListaPunto::create([
            'posicion' => 3,
            'puntos' => 10,
            'punto_id' => 3,
        ]);

        ListaPunto::create([
            'posicion' => 4,
            'puntos' => 8,
            'punto_id' => 3,
        ]);

        ListaPunto::create([
            'posicion' => 5,
            'puntos' => 6,
            'punto_id' => 3,
        ]);

        ListaPunto::create([
            'posicion' => 6,
            'puntos' => 5,
            'punto_id' => 3,
        ]);
        

    }
}