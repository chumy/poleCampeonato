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
     
        return $this->hasMany('App\Punto');
    }
}