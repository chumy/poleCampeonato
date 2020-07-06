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
        ]);

        Coche::create([
            'nombre' => 'Negro',
        ]);

        Coche::create([
            'nombre' => 'Azul',
        ]);

        Coche::create([
            'nombre' => 'Amarillo',
        ]);

        Coche::create([
            'nombre' => 'Verde',
        ]);

        Coche::create([
            'nombre' => 'Violeta',
        ]);
    }
}