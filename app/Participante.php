<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    //
    protected $fillable = [
        'nombre', 'apodo', 'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];


    public function carreras()
    {
        return $this->belongsToMany('App\Circuito', 'carreras');
    }

    public function campeonatos()
    {
        return $this->belongsToMany('App\Campeonato', 'inscritos');
    }

    public function escuderias()
    {
        return $this->belongsToMany('App\Escuderia', 'inscritos');
    }

    public function pilotos()
    {
        return $this->belongsToMany('App\Piloto', 'inscritos');
    }

    public function inscripciones()
    {
        return $this->hasMany('App\Inscrito');
    }

    public function puntuacionCampeonatos()
    {
        $resultado = [];

        foreach ($this->campeonatos as $campeonato) {
            // listado de campeonatos
            $i = 0;
            foreach ($campeonato->getClasificacion() as $clasificacion) {
                $i++;
                if ($clasificacion->inscrito->participante_id == $this->id) {

                    array_push($resultado, $clasificacion);
                }
            }
        }

        return collect($resultado);
    }

    /*
    public function inscribir(Campeonato $campeonato, Escuderia $escuderia = null , Piloto $piloto = null){
        $pilotoId = ($piloto == null) ? 0 : $piloto->id;
        $escuderiaId = ($escuderia == null) ? 0 : $escuderia->id;
       
        return $this->campeonatos()->attach($campeonato, ['escuderia_id' =>$escuderiaId ,  'piloto_id'=>$pilotoId]);
    }*/
}