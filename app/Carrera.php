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
        'nombre', 'visible',
    ];

        protected $casts = [
        'visible' => 'boolean',
    ];


    public function asignadas(){
        return $this->belongsToMany('App\Campeonato','campeonato_carrera')
                   ->withPivot( ['orden', 'punto_id']); 
    }
}