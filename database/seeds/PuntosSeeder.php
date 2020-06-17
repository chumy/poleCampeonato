<?php

use Illuminate\Database\Seeder;
use App\Punto;

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
        Punto::create([
            'nombre' => 'Puntuacion Estandard',
            'puntos1' =>'10',
            'puntos2' =>'8',
            'puntos3' =>'6',
            'puntos4' =>'5',
            'puntos5' =>'4',
            'puntos6' =>'3',
        ]);


         Punto::create([
            'nombre' => 'Puntuacion Escuderias',
            'puntos1' =>'10',
            'puntos2' =>'8',
            'puntos3' =>'6',
            'puntos4' =>'5',
            'puntos5' =>'4',
            'puntos6' =>'3',
            'penalizacion' => '0.5',
        ]);

         Punto::create([
            'nombre' => 'Puntuacion Extra Escuderias',
            'puntos1' =>'15',
            'puntos2' =>'12',
            'puntos3' =>'10',
            'puntos4' =>'8',
            'puntos5' =>'6',
            'puntos6' =>'5',
            'penalizacion' => '0.5',
        ]);
    }
}