<?php

namespace App\Http\Controllers;

use App\Piloto;
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pilotos = Piloto::all();
        return view('admin/piloto', compact('pilotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pilotos = Piloto::all();
        return view('admin/piloto', compact('pilotos'));
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
        // dd($request->all());
        $this->validate($request, ['nombre' => 'required', 'descripcion' => 'required']);
        $piloto = Piloto::create($request->all());
        $piloto->visible = $request->has('visible');
        $piloto->save();

        return redirect()->route('pilotos.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function show(Piloto $piloto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function edit(Piloto $piloto)
    {
        //
        $pilotos = Piloto::all();
        return view('admin/piloto', compact('pilotos', 'piloto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piloto $piloto)
    {
        //
        $this->validate($request, ['nombre' => 'required']);
        $piloto->fill($request->all());
        $piloto->visible = $request->has('visible');
        $piloto->save();

        return redirect()->route('pilotos.create')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piloto $piloto)
    {
        //
        $piloto->delete();

        return redirect()->route('pilotos.create')->with('success', 'Registro eliminado satisfactoriamente');
    }
}