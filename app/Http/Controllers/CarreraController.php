<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;

class CarreraController extends Controller
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
     * @param  Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
        $campeonato = $carrera->campeonato;
        $this->validate($request, ['nombre' => 'required']);
        $carrera->update($request->all());
        $carrera->save();

        return redirect()->route('campeonatos.carrera', compact('campeonato'))
            ->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
        $campeonato = $carrera->campeonato;
        $carrera->delete();

        return redirect()->route('campeonatos.carrera', compact('campeonato'))
            ->with('success', 'Registro eliminado satisfactoriamente');
    }


    public function up(Carrera $carrera)
    {


        //posicion original
        $posicion = $carrera->orden;
        $campeonato = $carrera->campeonato;



        if ($posicion > 1) {

            $carrera_prox = $campeonato->carreras->where('orden', $posicion - 1)->first();
            $carrera_prox->orden = $posicion;
            $carrera_prox->save();


            $carrera->orden = $posicion - 1;
            $carrera->save();
        }

        return redirect()->route('campeonatos.carrera', compact('campeonato'));
    }

    public function down(Carrera $carrera)
    {
        //posicion original
        $posicion = $carrera->orden;
        $campeonato = $carrera->campeonato;


        if ($posicion < $campeonato->carreras->count()) {

            $carrera_prox = $campeonato->carreras->where('orden', $posicion + 1)->first();
            $carrera_prox->orden = $posicion;
            $carrera_prox->save();

            $carrera->orden = $posicion + 1;
            $carrera->save();
        }

        return redirect()->route('campeonatos.carrera', compact('campeonato'));
    }
}