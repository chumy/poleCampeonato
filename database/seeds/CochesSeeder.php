<?php

use App\Coche;
use Illuminate\Database\Seeder;

class CochesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Coche::create([
            'nombre' => 'Rojo',
            'imagen' => '/uploads/images/coche_rojo.jpg',
        ]);

        Coche::create([
            'nombre' => 'Negro',
            'imagen' => '/uploads/images/coche_negro.jpg',
        ]);

        Coche::create([
            'nombre' => 'Azul',
            'imagen' => '/uploads/images/coche_azul.jpg',
        ]);

        Coche::create([
            'nombre' => 'Amarillo',
            'imagen' => '/uploads/images/coche_amarillo.jpg',
        ]);

        Coche::create([
            'nombre' => 'Verde',
            'imagen' => '/uploads/images/coche_verde.jpg',
        ]);

        Coche::create([
            'nombre' => 'Morado',
            'imagen' => '/uploads/images/coche_violeta.jpg',
        ]);
    }
}