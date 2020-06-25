<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    //
    protected $fillable = [
        'nombre', 'visible',
    ];

      /*  protected $casts = [
        'visible' => 'boolean',
    ];*/

    /*
    public function asignadas(){
        return $this->belongsToMany('App\Campeonato','campeonato_carrera')
                   ->withPivot( ['orden', 'punto_id']); 
    }

    public function participantes(){
        return $this->belongsToMany('App\Participante', 'carrera_participante')
            ->withPivot( ['posicion', 'abandono', 'campeonato_id']); 
    }*/
    
}