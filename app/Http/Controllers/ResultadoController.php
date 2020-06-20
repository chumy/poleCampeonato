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

        $campeonato=Campeonato::find(1);
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
            $carrera = Carrera::find(1);           
        }

        //dd($campeonato);
        $campeonatos=Campeonato::all();

        
        $parrilla = Resultado::where('campeonato_id',$campeonato->id)->where('carrera_id',$carrera->id)->orderBy('posicion','asc')->get();

        $restoparrilla = [];
        
        return view('admin/resultado', compact('campeonatos', 'campeonato','carrera', 'parrilla'  ));
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

    public function up(Campeonato $campeonato, Carrera $carrera, Participante $participante)
    {


        //posicion original

        $posicion = Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)
                            ->where('participante_id',$participante->id)
                            ->get()[0]
                            ->posicion;
        

        if ($posicion > 1){
            Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)
                            ->where('posicion',$posicion-1)
                            ->update(['posicion' => $posicion]);
             
            Resultado::where('campeonato_id',$campeonato->id)
                        ->where('carrera_id',$carrera->id)
                        ->where('participante_id',$participante->id)
                        ->update(['posicion' => $posicion-1]);

        }
      
        return redirect()->route('resultados.show',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id ] );
    }

    public function down(Campeonato $campeonato, Carrera $carrera, Participante $participante)
    {
        

        $posicion = Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)
                            ->where('participante_id',$participante->id)
                            ->get()[0]
                            ->posicion;
        
        if ($posicion < Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)->count())
        {
            Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)
                            ->where('posicion',$posicion+1)
                            ->update(['posicion' => $posicion]);
             
            Resultado::where('campeonato_id',$campeonato->id)
                        ->where('carrera_id',$carrera->id)
                        ->where('participante_id',$participante->id)
                        ->update(['posicion' => $posicion+1]);

        }
      
        return redirect()->route('resultados.show',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id ] );
    }

    public function participacion(Campeonato $campeonato, Carrera $carrera, Participante $participante)
    {

        $participacion = Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)
                            ->where('participante_id',$participante->id)
                            ->get()[0]
                            ->participacion;

        Resultado::where('campeonato_id',$campeonato->id)
                        ->where('carrera_id',$carrera->id)
                        ->where('participante_id',$participante->id)
                        ->update(['participacion' => ($participacion == 0) ? 1 : 0]);

        return redirect()->route('resultados.show',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id ] );
    }

    public function abandono(Campeonato $campeonato, Carrera $carrera, Participante $participante)
    {

        $abandono = Resultado::where('campeonato_id',$campeonato->id)
                            ->where('carrera_id',$carrera->id)
                            ->where('participante_id',$participante->id)
                            ->get()[0]
                            ->abandono;
        Resultado::where('campeonato_id',$campeonato->id)
                        ->where('carrera_id',$carrera->id)
                        ->where('participante_id',$participante->id)
                        ->update(['abandono' => ($abandono +1) % 2]);

        return redirect()->route('resultados.show',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id ] );
    }

    
}