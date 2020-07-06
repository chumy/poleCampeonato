<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscrito;
use App\Campeonato;
use App\Piloto;
use App\Escuderia;
use App\Participante;
use App\Coche;

class InscritoController extends Controller
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
        $inscrito = Inscrito::create($request->all());
        $inscrito->save();

        $campeonato = $inscrito->campeonato;

        //generar Resultados

        foreach ($campeonato->carreras as $carrera) {
            $carrera->setResultado($inscrito->participante, $campeonato->inscritos->count(), 0, 0);
        }



        return redirect()->route('inscritos.show', compact('campeonato'))
            ->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function show(Campeonato $campeonato)
    {
        //

        $escuderias = Escuderia::all();
        $pilotos = Piloto::all();
        $participantes = Participante::all()->diff($campeonato->participantes);
        $coches = Coche::all();



        return view('admin/inscrito', compact('campeonato', 'escuderias', 'pilotos', 'participantes', 'coches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscrito $inscrito)
    {
        //

        $campeonato = $inscrito->campeonato;
        $escuderias = Escuderia::all();
        $pilotos = Piloto::all();
        $coches = Coche::all();
        $participantes = Participante::all()->diff($campeonato->participantes);

        return view('admin/inscrito', compact('campeonato', 'escuderias', 'pilotos', 'participantes', 'inscrito', 'coches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscrito $inscrito)
    {
        //

        $inscrito->update($request->all());
        $campeonato = $inscrito->campeonato;
        return redirect()->route('inscritos.show', compact('campeonato'))
            ->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscrito $inscrito)
    {
        //
        $campeonato = $inscrito->campeonato;
        $inscrito->delete();

        return redirect()->route('inscritos.show', compact('campeonato'))
            ->with('success', 'Registro eliminado satisfactoriamente');
    }
}