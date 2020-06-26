<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscrito extends Model
{
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

    public function campeonato()
    {
        return $this->belongsTo('App\Campeonato');
    }
}