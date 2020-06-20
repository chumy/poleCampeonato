<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    //
    protected $table = 'carrera_participante';
    
    public function participante()
    {
        return $this->belongsTo('App\Participante');
    }

}