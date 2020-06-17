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
        factory(Escuderia::class)->create([
            'nombre' => 'Red Light',
            'descripcion' =>'',
            'visible' => true,
        ]);
    }
}
