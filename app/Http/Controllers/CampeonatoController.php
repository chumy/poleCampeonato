<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Campeonato;
use Illuminate\Http\Request;
use App\Punto;
use App\Participante;
use App\Escuderia;
use App\Circuito;

class CampeonatoController extends Controller
{
    /*
    public function __construct(){
        //$this->middleware('auth')->except('index', 'show' , 'piloto', 'escuderia');
        $this->middleware('auth')->only('create', 'store' , 'update', 'edit','destroy');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $campeonato = Campeonato::all()->first();

        return redirect()->route('campeonato.show', $campeonato->slug);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $campeonatos = Campeonato::all();
        $puntos = Punto::all();
        //dd($campeonatos);
        return view('admin/campeonato', compact('campeonatos', 'puntos'));
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
        //dd($request);
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        $campeonato = Campeonato::create($request->all());
        $campeonato->save();

        return redirect()->route('campeonatos.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        $campeonato = Campeonato::where('slug', $slug)->firstOrFail();

        //$campeonatos = Campeonato::all()->where('visible', 1);

        return view('campeonatos/descripcion', compact(
            'campeonato',
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function clasificacion($slug)
    {
        //

        $campeonato = Campeonato::where('slug', $slug)->firstOrFail();

        //$campeonatos = Campeonato::all()->where('visible', 1);

        return view('campeonatos/clasificacion', compact(
            'campeonato',
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function pilotos($slug)
    {
        //

        $campeonato = Campeonato::where('slug', $slug)->firstOrFail();
        $pilotos = $campeonato->participantes;

        //$campeonatos = Campeonato::all()->where('visible', 1);

        return view('pilotos/pilotos', compact(
            'campeonato',
            'pilotos'
        ));
    }

    public function piloto(String $slug, Participante $participante)
    {

        $campeonato = Campeonato::where('slug', $slug)->firstOrFail();

        // DB::enableQueryLog(); // Enable query log


        // $listaCarreras = $this->getResultadoPiloto($participante,  $campeonato);
        //dd($campeonato->participantes);
        //dd(DB::getQueryLog());
        //$apodos = $campeonato->participantes;
        $clasificacion = $campeonato->resultados->where('inscrito_id', $participante->inscripciones->where('campeonato_id', 1)->first()->id);
        return view('campeonatos/piloto', compact('campeonato', 'participante', 'clasificacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campeonato  $campeonato
     * @return \Illuminate\Http\Response
     */
    public function escuderias($slug)
    {
        //


        $campeonato = Campeonato::where('slug', $slug)->firstOrFail();
        $escuderias = $campeonato->escuderias()->get();

        //$campeonatos = Campeonato::all()->where('visible', 1);

        return view('escuderias/escuderias', compact(
            'campeonato',
            'escuderias'
        ));
    }


    public function escuderia(String $slug, Escuderia $escuderia)
    {
        //DB::enableQueryLog(); // Enable query log

        $campeonato = Campeonato::where('slug', $slug)->firstOrFail();
        //$listaCarreras = $this->getResultadoEscuderia($campeonato, $escuderia);
        //dd($campeonato->participantes);
        //dd(DB::getQueryLog());
        //$escuderias =  $this->getClasificacionEscuderias($campeonato);
        return view('campeonatos/escuderia', compact('campeonato', 'escuderia'));
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
        $campeonatos = Campeonato::all();
        $puntos = Punto::all();
        //dd($campeonatos);
        return view('admin/campeonato', compact('campeonatos', 'puntos', 'campeonato'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        //dd($request->all());
        $campeonato->fill($request->all());
        $campeonato->visible = $request->has('visible');
        $campeonato->pilotos = $request->has('pilotos');
        $campeonato->escuderias = $request->has('escuderias');

        $campeonato->save();

        return redirect()->route('campeonatos.create')->with('success', 'Registro actualizado satisfactoriamente');
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
        $campeonato->delete();

        return redirect()->route('campeonatos.create')->with('success', 'Registro eliminado satisfactoriamente');
    }
}