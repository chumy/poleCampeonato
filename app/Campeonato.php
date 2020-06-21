<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    //

    public function carreras(){
        return $this->belongsToMany('App\Carrera')
                    ->withPivot(['orden']);
    }

    public function participantes(){
        return $this->belongsToMany('App\Participante','campeonato_participante')
                   ->withPivot( ['escuderia_id']); 
    }

    public function puntuaciones()
    {
        return $this->hasOne('App\Punto', 'id');
    }

    public function escuderias()
    {
        return $this->belongsToMany('App\Escuderia','campeonato_participante')
                   ->withPivot( ['participante_id']); 
    }
}