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
}