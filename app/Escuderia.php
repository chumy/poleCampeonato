<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuderia extends Model
{
    //
    protected $fillable = [
        'nombre', 'descripcion', 'visible',
    ];

        protected $casts = [
        'visible' => 'boolean',
    ];
    
    public function campeonatos(){
        return $this->belongsToMany('App\Campeonato','campeonato_participante');
    }

}