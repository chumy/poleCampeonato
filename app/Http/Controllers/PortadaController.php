<?php

namespace App\Http\Controllers;

use App\Campeonato;
use Illuminate\Http\Request;

class PortadaController extends Controller
{
    //
    public function index()
    {

        $campeonatos = Campeonato::all();
        $carreras = [];
        return view('welcome', compact('campeonatos', 'carreras'));
    }
}