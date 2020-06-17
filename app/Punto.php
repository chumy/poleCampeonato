<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    //
    protected $fillable = [
        'nombre', 'puntos1', 'puntos2', 'puntos3', 'puntos4', 
        'puntos5', 'puntos6', 'penalizacion', 
    ];

     
}