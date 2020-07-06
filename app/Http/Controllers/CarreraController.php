<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Punto;
use App\Circuito;
use App\Campeonato;

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

        $this->validate($request, ['fecha' => 'nullable|date']);
        $carrera = Carrera::create($request->all());
        $campeonato = $carrera->campeonato;
        $orden = $campeonato->carreras->count();
        $carrera->orden = $orden;
        $carrera->save();

        //generar Resultados
        $i = 0;
        foreach ($campeonato->inscritos as $inscrito) {
            $i++;
            $carrera->setResultado($inscrito, $i, 0, 0);
        }



        return redirect()->route('carreras.show', compact('campeonato'))
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
        $circuitos = Circuito::all();
        $puntos = Punto::all();

        return view('admin/carrera', compact('campeonato', 'circuitos', 'puntos'));
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
        $campeonato = $carrera->campeonato;

        $circuitos = Circuito::all();
        $puntos = Punto::all();
        return view('admin/carrera', compact('campeonato', 'circuitos', 'puntos', 'carrera'));
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
        $this->validate($request, ['fecha' => 'nullable|date']);
        $campeonato = $carrera->campeonato;
        $carrera->update($request->all());
        $carrera->save();

        return redirect()->route('carreras.show', compact('campeonato'))
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

        return redirect()->route('carreras.show', compact('campeonato'))
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

        return redirect()->route('carreras.show', compact('campeonato'));
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

        return redirect()->route('carreras.show', compact('campeonato'));
    }

    /**
     * Cambia la visibilidad de una carrera para mostrar sus resultados
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function visible(Carrera $carrera)
    {
        //
        $campeonato = $carrera->campeonato;
        $carrera->visible = ($carrera->visible == 1) ? 0 : 1;

        $carrera->save();


        return redirect()->route('carreras.show', compact('campeonato'));
    }
}