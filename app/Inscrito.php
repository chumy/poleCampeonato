<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrito extends Model
{
    protected $fillable = [
        'campeonato_id', 'participante_id', 'escuderia_id', 'piloto_id', 'coche_id',
    ];
    //
    public function escuderia()
    {
        return $this->belongsTo('App\Escuderia', 'escuderia_id');
    }

    public function participante()
    {
        return $this->belongsTo('App\Participante');
    }

    public function piloto()
    {
        return $this->belongsTo('App\Piloto');
    }

    public function coche()
    {
        return $this->belongsTo('App\Coche');
    }


    public function campeonato()
    {
        return $this->belongsTo('App\Campeonato');
    }

    public function setResultado(Carrera $carrera, $posicion, $abandono, $participacion)
    {
        $abandono = ($abandono == 1) ? 1 : 0;
        $participacion = ($participacion == 0) ? 0 : 1;

        $resultado = new Resultado(['abandono' => $abandono, 'participacion' => $participacion, 'posicion' => $posicion]);

        $resultado->carrera()->associate($carrera);
        $resultado->inscrito()->associate($this);

        return $resultado->save();
    }
}