<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'activo',
    ];

        protected $casts = [
        'visible' => 'boolean',
    ];
}