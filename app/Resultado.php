<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posicion', 'abandono', 'participacion',
    ];


    public function participante()
    {
        return $this->inscrito->participante;
    }

    /*public function carrera(){
        return $this->belongsToMany('App\Carrera');
    }*/

    public function carrera()
    {
        return $this->belongsTo('App\Carrera');
    }

    public function inscrito()
    {
        return $this->belongsTo('App\Inscrito');
    }


    public function campeonato()
    {
        return $this->carrera->campeonato;
    }


    public function puntos()
    {
        return $this->carrera->puntos->puntos->where('posicion', $this->posicion)->first()->puntos;
    }

    public function puntuacion()
    {
        return $this->carrera->puntos;
    }

    /*
     public function inscrito(){
        return $this->belongsToMany('App\Inscrito','inscritos');
    }*/

    /*public function setResultado(Inscrito $inscrito, Carrera $carrera, $posicion, $abandono = null )
    {
        $abandono = ($abandono == 1 ) ? 1 : 0;
        return $this->inscrito()->attach($inscrito,[ 'carrera_id' => $carrera->id , 'posicion'=>$posicion, 'abandono'=> $abandono]);
    }*/
}