<?php

use App\Escuderia;
use Illuminate\Database\Seeder;

class EscuderiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuderia::create([
            'nombre' => 'Red Light',
            'descripcion' =>'',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Green Greyhounds',
            'descripcion' =>'',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Yellow Energy',
            'descripcion' =>'',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Blue Sonic',
            'descripcion' =>'',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Black Lotus',
            'descripcion' =>'',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Purple Sound',
            'descripcion' =>'',
            'visible' => true,
        ]);
    }
}