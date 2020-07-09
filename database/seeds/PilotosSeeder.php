<?php

use Illuminate\Database\Seeder;
use App\Piloto;

class PilotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Piloto::create([
            'nombre' => 'M . Schumaher',
            'descripcion' => 'Recupera 2 PH extra en la primera parada en boxes y 1 PH extra en la segunda parada en boxes. En las siguientes
paradas en boxes (si las hubiera) no recupera ningún PH extra.
En carreras cortas a 8 vueltas sólo recupera 2PH extra en la primera para da en boxes y ningún PH extra en las
demás paradas.',
        ]);

        Piloto::create([
            'nombre' => 'L. Hamyltonn',
            'descripcion' => 'Dispone de un punto adicional al obtenido en el dado tradicional en una pelea por adelantamiento, siempre y cuando
sea él el que intenta adelantar.',
        ]);

        Piloto::create([
            'nombre' => 'A. Shena',
            'descripcion' => ' En lluvia ligera, el piloto se saldrá de pista con un 10 en lugar de con 9.
En lluvia intensa, el piloto sufre una salida de pista con un 9 en lugar de con un 8.',
        ]);

        Piloto::create([
            'nombre' => 'A. Prosht',
            'descripcion' => 'Dispone de un punto adicional al obtenido en el dado tradicional en una pelea por adelantamiento, siempre y cuando
sea él el que va a ser adelantado.',
        ]);

        Piloto::create([
            'nombre' => 'F. Alonzo',
            'descripcion' => 'Suma un punto adicional al resultado de sus dos tiradas de “vuelta extra” en cada una de las rondas de la
clasificación.
En las dos primeras tiradas de salida sumará dos puntos a la tirada obtenida con el dado tradicional.
Si se reinicia la carrera después de un Safety Car, en la primera tirada sumará dos puntos al resultado obtenido en su
dado de neumáticos.',
        ]);

        Piloto::create([
            'nombre' => 'S. Vethel',
            'descripcion' => 'Dispone de 4 tokens cada uno de los cuales le permite evitar en una tirada que el neumático reste -1 por desgaste. En
caso de desgaste -2 , el uso de un token implica que sólo restará 1.
En caso de riesgo de sufrir un reventón, si obtiene un 1 con el dado de seis caras tradicional, puede repetir la tirada y
volver a tirarlo una vez.',
        ]);
    }
}