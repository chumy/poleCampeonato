<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campeonato;
use App\Carrera;
use App\Resultado;
use App\Participante;

class ResultadoController extends Controller
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

        $campeonato = Campeonato::find(1);
        //
        return redirect()->route('resultados.show', $campeonato);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Campeonato $campeonato, Carrera $carrera = null)
    {
        if (!$carrera) {

            $carrera = $campeonato->carreras->first();
        }

        //dd($campeonato);
        $campeonatos = Campeonato::all();



        return view('admin/resultado', compact('campeonatos', 'campeonato', 'carrera'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function up(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {


        //posicion original
        $posicion = $resultado->posicion;

        if ($posicion > 1) {

            $resultado_prox = $carrera->resultados->where('posicion', $posicion - 1)->first();
            $resultado_prox->posicion = $posicion;
            $resultado_prox->save();

            $resultado->posicion = $posicion - 1;
            $resultado->save();
        }

        /* $posicion = Resultado::where('campeonato_id', $campeonato->id)
            ->where('carrera_id', $carrera->id)
            ->where('participante_id', $participante->id)
            ->get()->first()
            ->posicion;


        if ($posicion > 1) {
            Resultado::where('campeonato_id', $campeonato->id)
                ->where('carrera_id', $carrera->id)
                ->where('posicion', $posicion - 1)
                ->update(['posicion' => $posicion]);

            Resultado::where('campeonato_id', $campeonato->id)
                ->where('carrera_id', $carrera->id)
                ->where('participante_id', $participante->id)
                ->update(['posicion' => $posicion - 1]);
        }*/
        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id,]);
    }

    public function down(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {


        $posicion = $resultado->posicion;

        if ($posicion < $resultado->carrera->campeonato->num_coches) {

            $resultado_prox = $carrera->resultados->where('posicion', $posicion + 1)->first();
            $resultado_prox->posicion = $posicion;
            $resultado_prox->save();

            $resultado->posicion = $posicion + 1;
            $resultado->save();

            /*
            Resultado::where('campeonato_id', $campeonato->id)
                ->where('carrera_id', $carrera->id)
                ->where('posicion', $posicion + 1)
                ->update(['posicion' => $posicion]);

            Resultado::where('campeonato_id', $campeonato->id)
                ->where('carrera_id', $carrera->id)
                ->where('participante_id', $participante->id)
                ->update(['posicion' => $posicion + 1]);*/
        }

        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id,]);
    }

    public function participacion(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {

        $resultado->participacion =  ($resultado->participacion == 0) ? 1 : 0;
        $resultado->save();

        /* $participacion = Resultado::where('campeonato_id', $campeonato->id)
            ->where('carrera_id', $carrera->id)
            ->where('participante_id', $participante->id)
            ->get()->first()
            ->participacion;

        Resultado::where('campeonato_id', $campeonato->id)
            ->where('carrera_id', $carrera->id)
            ->where('participante_id', $participante->id)
            ->update(['participacion' => ($participacion == 0) ? 1 : 0]);*/

        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id]);
    }

    public function abandono(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {

        $resultado->abandono =  ($resultado->abandono == 0) ? 1 : 0;
        $resultado->save();
        //$abandono = ($resultado->abandono == 0) ? 1 : 0;

        //$resultado->update(['abandono' => $abandono]);


        /*
        $abandono = Resultado::where('campeonato_id', $campeonato->id)
            ->where('carrera_id', $carrera->id)
            ->where('participante_id', $participante->id)
            ->get()->first()
            ->abandono;
        Resultado::where('campeonato_id', $campeonato->id)
            ->where('carrera_id', $carrera->id)
            ->where('participante_id', $participante->id)
            ->update(['abandono' => ($abandono == 0) ? 1 : 0]);*/

        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id]);
    }
}