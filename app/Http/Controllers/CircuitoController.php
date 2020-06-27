<?php

namespace App\Http\Controllers;

use App\Circuito;
use Illuminate\Http\Request;

class CircuitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $circuitos = Circuito::all();
        return view('admin/circuito', compact('circuitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $circuitos = Circuito::all();
        return view('admin/circuito', compact('circuitos'));
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
        $circuito = Circuito::create($request->all());
        $circuito->visible = $request->has('visible');
        $circuito->save();

        return redirect()->route('circuitos.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function show(Circuito $circuito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function edit(Circuito $circuito)
    {
        $circuitos = Circuito::all();
        return view('admin/circuito', compact('circuitos', 'circuito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circuito $circuito)
    {
        //
        $this->validate($request, ['nombre' => 'required']);
        $circuito->update($request->all());
        $circuito->visible = $request->has('visible');
        $circuito->save();

        return redirect()->route('circuitos.create')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circuito  $circuito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Circuito $circuito)
    {
        //
        $circuito->delete();

        return redirect()->route('circuitos.create')->with('success', 'Registro eliminado satisfactoriamente');
    }
}