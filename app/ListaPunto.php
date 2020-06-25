<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaPunto extends Model
{
    //
    protected $table = 'lista_puntos';

    public function puntuacion()
    {
        return $this->belongsTo('App\Punto', 'punto_id');
    }
}