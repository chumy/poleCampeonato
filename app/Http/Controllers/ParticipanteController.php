<?php

namespace App\Http\Controllers;

use App\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pilotos = Participante::all();
        return view('pilotos/pilotos', compact('pilotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $participantes = Participante::all();
        return view('admin/participante', compact('participantes'));
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
        $this->validate($request, ['nombre' => 'required', 'apodo' => 'required']);
        $participante = Participante::create($request->all());
        $participante->visible = $request->has('visible');
        $participante->save();

        return redirect()->route('participantes.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function show(Participante $participante)
    {
        //
        $pilotos = Participante::all();
        //$puntuaciones = $this->getPuntuacionCampeonatos($participante);
        return view('pilotos/resultado', compact('pilotos', 'participante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function edit(Participante $participante)
    {
        //
        $participantes = Participante::all();
        return view('admin/participante', compact('participantes', 'participante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participante $participante)
    {
        //
        $this->validate($request, ['nombre' => 'required', 'apodo' => 'required']);
        $participante->fill($request->all());
        $participante->visible = $request->has('visible');
        $participante->save();

        return redirect()->route('participantes.create')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participante $participante)
    {
        //
    }
    /*public function getPuntuacionCampeonatos(Participante $participante)
    {

        // tipo 1
        return DB::table(DB::raw('carrera_participante, campeonato_carrera, carreras, lista_puntos, participantes, puntos, campeonatos, campeonato_participante'))
            ->leftjoin('pilotos', 'pilotos.id', '=', 'campeonato_participante.piloto_id')
            ->leftjoin('escuderias', 'escuderias.id', '=', 'campeonato_participante.escuderia_id')
            ->select((DB::raw(' participantes.id, participantes.apodo, campeonatos.nombre campeonato, escuderias.nombre escuderia, pilotos.nombre piloto, floor ( sum( if(carrera_participante.abandono, lista_puntos.puntos * puntos.penalizacion, lista_puntos.puntos ) ) ) puntos   ')))
            ->whereColumn([
                ['carrera_participante.carrera_id',  'campeonato_carrera.carrera_id'],
                ['carrera_participante.carrera_id',  'carreras.id'],
                ['carrera_participante.posicion',  'lista_puntos.posicion'],
                ['carrera_participante.participante_id', 'participantes.id'],
                ['campeonato_carrera.punto_id',  'puntos.id'],
                ['campeonato_participante.participante_id',  'participantes.id'],
                ['campeonato_carrera.carrera_id', 'carreras.id'],
                ['puntos.id', 'lista_puntos.punto_id'],
                ['carrera_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                ['campeonato_participante.campeonato_id',  'campeonato_carrera.campeonato_id'],
                ['campeonato_participante.campeonato_id',  'campeonatos.id'],
            ])
            ->where([
                ['carrera_participante.participante_id', '=', $participante->id],
            ])
            ->groupBy('carrera_participante.campeonato_id', 'participantes.id', 'participantes.apodo', 'escuderias.nombre', 'pilotos.nombre')
            ->orderBy('puntos', 'desc')
            ->get();
    }*/
}