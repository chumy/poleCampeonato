<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    //
    protected $fillable = [
        'nombre', 'visible', 'descripcion',
    ];
}