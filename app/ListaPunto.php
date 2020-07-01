<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaPunto extends Model
{
    //
    protected $table = 'listapuntos';

    protected $fillable = [
        'posicion',  'puntos', 'punto_id'
    ];

    public function puntuacion()
    {
        return $this->belongsTo('App\Punto', 'punto_id');
    }
}