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


    public function carreras(){
        return $this->belongsToMany('App\Carrera', 'carrera_participante')
                ->withPivot(['posicion', 'campeonato_id']);
    }

    public function campeonatos(){
        return $this->belongsToMany('App\Campeonato','campeonato_participante');
    }

    public function escuderias(){
        return $this->belongsToMany('App\Escuderia','campeonato_participante')
                ->withPivot(['campeonato_id']);;
    }



}