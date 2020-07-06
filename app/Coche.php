<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    //
    protected $fillable = [
        'nombre', 'imagen',
    ];

    public function campeonatos()
    {
        return $this->belongsToMany('App\Campeonato', 'inscritos');
    }
}