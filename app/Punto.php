<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    //
    protected $fillable = [
        'nombre',  'penalizacion',
    ];


    public function puntos()
    {

        return $this->hasMany('App\ListaPunto');
    }

    public function campeonatos()
    {
        return $this->hasMany('App\Campeonato');
    }

    public function toText()
    {
        return $this->puntos()->orderBy('posicion')->pluck('puntos')->implode('-');
    }

    public function getPunto(int $posicion)
    {
        return $this->puntos->where('posicion', $posicion)->first();
    }
}