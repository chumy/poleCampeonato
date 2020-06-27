<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Campeonato;
use Illuminate\Http\Request;
use App\Punto;
use App\Participante;
use App\Escuderia;

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
        $campeonato = Campeonato::find(1);
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
        $campeonatos = Campeonato::all();
        $puntos = Punto::all();
        $campeonato = [];
        //dd($campeonatos);
        return view('admin/campeonato', compact('campeonatos', 'puntos', 'campeonato'));
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
        $this->validate($request, ['nombre' => 'required']);
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
    public function show(Campeonato $campeonato)
    {
        //

        $campeonatos = Campeonato::all()->where('visible', 1);

        $clasificacionEscuderias = [];
        // Obtener datos de escuderias
        /*if ($campeonato->tipo == 2) {

            $clasificacionEscuderias =  $this->getClasificacionEscuderias($campeonato);
        }*/
        //dd($clasificacionEscuderias[0]["id"]);
        //DB::enableQueryLog();
        $puntosEspeciales = [];

        /* $carreasEspeciales = $this->getCarrerasEspeciales($campeonato);
        if (sizeof($carreasEspeciales) > 0) {
            foreach ($carreasEspeciales as $carr) {
                $puntosEspeciales[] = Punto::find($carr->punto_id);
            }
        }*/
        // dd(DB::getQueryLog());
        //$clasificacionCampeonato =  $this->getClasificacionCampeonato($campeonato);
        $clasificacionCampeonato = [];

        return view('campeonatos/campeonato', compact(
            'campeonatos',
            'campeonato',
            'clasificacionCampeonato',
            'clasificacionEscuderias',
            'puntosEspeciales'
        ));
    }

    public function piloto(Campeonato $campeonato, Participante $participante)
    {
        // DB::enableQueryLog(); // Enable query log


        // $listaCarreras = $this->getResultadoPiloto($participante,  $campeonato);
        //dd($campeonato->participantes);
        //dd(DB::getQueryLog());
        //$apodos = $campeonato->participantes;
        $clasificacion = $campeonato->resultados->where('inscrito_id', $participante->inscripciones->where('campeonato_id', 1)->first()->id);
        return view('campeonatos/piloto', compact('campeonato', 'participante', 'clasificacion'));
    }

    public function escuderia(Campeonato $campeonato, Escuderia $escuderia)
    {
        //DB::enableQueryLog(); // Enable query log


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