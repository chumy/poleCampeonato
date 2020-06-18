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
                   ->withPivot( ['escuderia_id']); ;
    }
}