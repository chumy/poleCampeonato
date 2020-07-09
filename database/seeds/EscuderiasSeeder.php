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
            'nombre' => 'Ferrari',
            'descripcion' => 'Escuderia Ferrari',
            'imagen' => '/uploads/images/ferrari.jpg',
            'visible' => true,
        ]);
        Escuderia::create([
            'nombre' => 'Williams',
            'descripcion' => 'Escuderia Williams',
            'imagen' => '/uploads/images/williams.jpg',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Lotus',
            'descripcion' => 'Escuderia Lotus',
            'imagen' => '/uploads/images/lotus.jpg',
            'visible' => true,
        ]);
        Escuderia::create([
            'nombre' => 'Red Light',
            'descripcion' => 'Mejor motor. 
            Tiene 3 puntos adicionales de motor.',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Green Greyhounds',
            'descripcion' => 'El mejor equipo en boxes. Si entra en el mismo turno que otros jugadores que le
precede/n y la diferencia con ellos a la hora de anotar los puntos sobrantes no es superior a tres puntos, le/s adelantará
durante la parada, se cambiarán las posiciones en el Marcador de posición y, por tanto, saldrá antes que ellos.
cualquier otro caso de parada en boxes, sumará tres puntos a la tirada especial de salida de boxes.',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Yellow Energy',
            'descripcion' => 'Mejor telemetría. En la primera parada en boxes podrá recuperar un punto de motor o
un punto de frenos a su elección. En la tirada especial de salida en boxes de cada parada sumará un punto.',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Blue Sonic',
            'descripcion' => 'Coche más consistente. 
            Restará dos puntos al dado tradicional (caso que le convenga) cuando haga la tirada especial para determinar los daños en una colisión. 
            En el cómputo de daños por avería quedará fuera de carrera cuando supere los cinco puntos. 
            Las averías de evento no le afectan (tampoco le pueden afectar los eventos que impliquen pérdida de motor y/o frenos',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Black Lotus',
            'descripcion' => 'Mejor balance chasis-consistencia. 
            Tiene 1 punto adicional de frenos. 
            Puede repetir una vez la tirada especial para determinar los daños cada vez que se produzca una colisión sin necesidad de usar un PH para ello. Si el jugador decide además gastar un PH podrá repetir la tirada una segunda vez. 
            Las averías producidas por evento no le pueden afectar, pero sí le pueden afectar los eventos que impliquen pérdida de motor y/o frenos.',
            'visible' => true,
        ]);

        Escuderia::create([
            'nombre' => 'Purple Sound',
            'descripcion' => 'Mejor chasis Tiene 3 puntos adicionales de frenos.',
            'visible' => true,
        ]);
    }
}