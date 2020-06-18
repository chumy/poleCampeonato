<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campeonato = Campeonato::find(1);

        //DB::enableQueryLog(); // Enable query log

        //$clasificacionCampeonato =  $this->getClasificacionCampeonato($campeonato) );
        //dd(DB::getQueryLog());
        

         return redirect()->route('campeonato.show', $campeonato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function show(Campeonato $campeonato)
    {
        //
        /*select ca.nombre, pa.apodo, cp.posicion, lpu.puntos
        from campeonatos c, campeonato_carrera cc, carreras ca,
        carrera_participante cp, participantes pa, 
        puntos pu, lista_puntos lpu

        where c.id = cc.campeonato_id
        and cc.carrera_id in (1,2)
        and cc.carrera_id = ca.id
        and ca.id = cp.carrera_id
        and c.id = cp.campeonato_id
        and pa.id = cp.participante_id
        and c.punto_id = pu.id
        and lpu.punto_id = pu.id
        and cp.posicion = lpu.posicion
        order by cc.orden, cp.posicion*/
        $campeonatos = Campeonato::all()->where('visible',1);
        $clasificacionCampeonato =  $this->getClasificacionCampeonato($campeonato) ;

        return view('campeonatos/campeonato' , compact('campeonatos', 'campeonato','clasificacionCampeonato'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function edit(Campeonato $campeonato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campeonato $campeonato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campeonato $campeonato)
    {
        //
    }

    public function  getClasificacionCarrera($campeonato, $carrera)
    {

         /*
            select carreras.nombre, participantes.apodo, carrera_participante.posicion, lista_puntos.puntos 
            from carrera_participante 
            inner join carreras on carrera_participante.carrera_id = carreras.id 
            inner join campeonato_carrera on carrera_participante.id = carreras.id 
            inner join lista_puntos on carrera_participante.posicion = lista_puntos.posicion 
            inner join participantes on carrera_participante.participante_id = participantes.id 

            inner join puntos on puntos.id = lista_puntos.punto_id
            where carrera_participante.campeonato_id = 1*/



        return DB::table('carrera_participante')
                ->join('campeonato_carrera', 'carrera_participante.carrera_id', '=', 'campeonato_carrera.carrera_id')
                ->join('carreras', 'carrera_participante.carrera_id', '=', 'carreras.id')
                ->join('lista_puntos', 'carrera_participante.posicion', '=', 'lista_puntos.posicion')
                ->join('participantes', 'carrera_participante.participante_id', '=', 'participantes.id')
                ->join('puntos', 'campeonato_carrera.punto_id', '=', 'puntos.id')
                ->select('carreras.nombre', 'participantes.apodo', 'carrera_participante.posicion', 'lista_puntos.puntos' )
                ->whereColumn ( [
                        ['campeonato_carrera.carrera_id', 'carreras.id'],
                        ['puntos.id', 'lista_puntos.punto_id'],
                        ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['puntos.id' , 'carrera_participante.campeonato_id'],
                ])
                ->where( [
                        ['carrera_participante.campeonato_id', '=', $campeonato->id], 
                        ['campeonato_carrera.carrera_id','=', $carrera->id],    
                ])
                ->orderBy('campeonato_carrera.orden')
                ->get();
                




           
    }

    public function  getClasificacionCampeonato($campeonato)
    {

         /*
            select carreras.nombre, participantes.apodo, carrera_participante.posicion, lista_puntos.puntos 
            from carrera_participante 
            inner join carreras on carrera_participante.carrera_id = carreras.id 
            inner join campeonato_carrera on carrera_participante.id = carreras.id 
            inner join lista_puntos on carrera_participante.posicion = lista_puntos.posicion 
            inner join participantes on carrera_participante.participante_id = participantes.id 

            inner join puntos on puntos.id = lista_puntos.punto_id
            where carrera_participante.campeonato_id = 1*/



        return DB::table('carrera_participante')
                ->join('campeonato_carrera', 'carrera_participante.carrera_id', '=', 'campeonato_carrera.carrera_id')
                ->join('carreras', 'carrera_participante.carrera_id', '=', 'carreras.id')
                ->join('lista_puntos', 'carrera_participante.posicion', '=', 'lista_puntos.posicion')
                ->join('participantes', 'carrera_participante.participante_id', '=', 'participantes.id')
                ->join('puntos', 'campeonato_carrera.punto_id', '=', 'puntos.id')
                ->join('campeonato_participante', 'campeonato_participante.participante_id', '=', 'participantes.id')
                ->join('escuderias', 'escuderias.id', '=', 'campeonato_participante.escuderia_id')
                ->select((DB::raw(' participantes.id, participantes.apodo, escuderias.nombre escuderia,  sum(lista_puntos.puntos) puntos ') ) )
                ->whereColumn ( [
                        ['campeonato_carrera.carrera_id', 'carreras.id'],
                        ['puntos.id', 'lista_puntos.punto_id'],
                        ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                        ['puntos.id' , 'carrera_participante.campeonato_id'],
                         ['campeonato_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                ])
                ->where( [
                        ['carrera_participante.campeonato_id', '=', $campeonato->id],    
                ])
                ->groupBy('participantes.id', 'participantes.apodo', 'escuderias.nombre')
                ->orderBy('puntos','desc')
                ->get();
       
    }
}