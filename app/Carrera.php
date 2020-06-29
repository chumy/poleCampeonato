<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inscrito;

class Carrera extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orden', 'campeonato_id', 'circuito_id', 'punto_id',
    ];

    /*  protected $casts = [
        'visible' => 'boolean',
    ];*/


    public function circuito()
    {
        return $this->belongsTo('App\Circuito');
    }

    public function campeonato()
    {
        return $this->belongsTo('App\Campeonato');
    }

    public function resultados()
    {
        return $this->hasMany('App\Resultado');
    }

    public function puntos()
    {
        return $this->belongsTo('App\Punto', 'punto_id');
    }

    public function setResultado(Participante $participante, $posicion, $abandono, $participacion)
    {
        $abandono = ($abandono == 1) ? 1 : 0;
        $participacion = ($participacion == 0) ? 0 : 1;

        $inscrito = $participante->inscripciones()->where('campeonato_id', 1)->first();

        $resultado = new Resultado(['abandono' => $abandono, 'participacion' => $participacion, 'posicion' => $posicion]);

        $resultado->carrera()->associate($this);
        $resultado->inscrito()->associate($inscrito);

        return $resultado->save();
    }

    public function getResultado()
    {
        //$resultados = $this->resultados;
        /*
        $resultados->map(function ($resultado) {
            $resultado->puntuacion = $this->puntos
                ->puntos()
                ->where('posicion', $resultado->posicion)
                ->pluck('puntos')->first();
            //return $resultado;
        });*/

        $resultados = [];
        foreach ($this->resultados as $resultado) {
            $resultado->puntuacion = $this->puntos
                ->puntos()
                ->where('posicion', $resultado->posicion)
                ->pluck('puntos')->first();

            array_push($resultados, $resultado);
        }


        return collect($resultados)->sortBy('posicion');
    }
}