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
        'posicion', 'abandono',
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

    public function setResultado(Participante $participante, $posicion, $abandono = 0, $participacion = 1)
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
        $resultados = $this->resultados;
        /*foreach ($resultados as &$resultados) {
            $resultados['puntuacion'] = $this->puntos
                ->puntos()
                ->where('posicion', $resultados->posicion)
                ->pluck('puntos')->first();
        }*/

        $resultados->map(function ($resultado) {
            $resultado['puntuacion'] = $this->puntos
                ->puntos()
                ->where('posicion', $resultado->posicion)
                ->pluck('puntos')->first();
            return $resultado;
        });
        /*
        $posts->map(function ($post) {
            $post['url'] = 'http://your.url/here';
            return $post;
        });*/
        return $resultados->sortByDesc('posicion');;
    }
}