<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campeonato;
use App\Carrera;
use App\Resultado;
use App\Participante;
use Illuminate\Support\Facades\DB;

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

        $campeonato = Campeonato::all()->first();
        if (!$campeonato)
            return view('admin/resultado', compact('campeonato'));
        else
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


        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id,]);
    }

    public function down(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {


        $posicion = $resultado->posicion;

        if ($posicion < $resultado->carrera->campeonato->inscritos->count()) {

            $resultado_prox = $carrera->resultados->where('posicion', $posicion + 1)->first();
            $resultado_prox->posicion = $posicion;
            $resultado_prox->save();

            $resultado->posicion = $posicion + 1;
            $resultado->save();
        }

        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id,]);
    }

    public function participacion(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {


        $nuevaposicion = Resultado::all()->where('carrera_id', $carrera->id)->where('participacion', 1)->count() + 1;


        $participacion =  ($resultado->participacion == 0) ? 1 : 0;

        if ($participacion == 1) {

            Resultado::where('carrera_id', $carrera->id)->where('posicion',  $nuevaposicion)->update(['posicion' => $resultado->posicion]);

            $resultado->posicion = $nuevaposicion;
        } else {

            Resultado::where('carrera_id', $carrera->id)->where('posicion', '>', $resultado->posicion)->update(['posicion' => DB::raw('posicion - 1')]);
            $resultado->posicion = Resultado::all()->where('carrera_id', $carrera->id)->count();
        }


        $resultado->participacion =  $participacion;
        $resultado->save();


        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id]);
    }

    public function abandono(Campeonato $campeonato, Carrera $carrera, Resultado $resultado)
    {

        $resultado->abandono =  ($resultado->abandono == 0) ? 1 : 0;
        $resultado->save();

        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id]);
    }

    public function publicar(Campeonato $campeonato, Carrera $carrera)
    {

        $carrera->visible =  ($carrera->visible == 0) ? 1 : 0;
        $carrera->save();


        return redirect()->route('resultados.show',  ['campeonato' => $campeonato->id, 'carrera' => $carrera->id]);
    }
}