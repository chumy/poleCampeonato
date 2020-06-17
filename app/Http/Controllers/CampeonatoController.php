<?php

namespace App\Http\Controllers;

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
}