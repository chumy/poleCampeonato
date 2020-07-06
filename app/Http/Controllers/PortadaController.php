<?php

namespace App\Http\Controllers;

use App\Campeonato;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Carrera;

class PortadaController extends Controller
{
    //
    public function index()
    {

        $campeonatos = Campeonato::all()->where('visible', 1);
        $carreras = Carrera::all()->where('fecha', '>', Carbon::today())->take(3);
        $carreras = Carrera::whereHas('campeonato', function ($q) {
            $q->where('visible', 1);
        })->get();
        $carreras = $carreras->where('fecha', '>', Carbon::today())->take(3);

        $carreras = Carrera::whereHas('campeonato', function ($q) {
            $q->where('visible', 1);
        })->where('fecha', '>', Carbon::today())->orderby('fecha', 'asc')->get()->take(3);


        //dd($carreras);
        return view('welcome', compact('campeonatos', 'carreras'));
    }
}