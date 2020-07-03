<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuderia extends Model
{
    //
    protected $fillable = [
        'nombre', 'descripcion', 'visible', 'imagen',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public function campeonatos()
    {
        return $this->belongsToMany('App\Campeonato', 'inscritos');
    }

    public function inscritos()
    {
        return $this->hasMany('App\Inscrito');
    }


    public function puntuacionCampeonatos()
    {
        $resultado = [];

        foreach ($this->campeonatos as $campeonato) {
            // listado de campeonatos

            foreach ($campeonato->getClasificacionEscuderias() as $clasificacion) {

                if ($clasificacion->escuderia->id == $this->id) {

                    $clasificacion->campeonato = Campeonato::find($campeonato->id);
                    array_push($resultado, $clasificacion);
                }
            }
        }

        return collect($resultado);
    }
}