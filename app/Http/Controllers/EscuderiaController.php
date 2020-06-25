<?php

namespace App\Http\Controllers;

use App\Escuderia;
use Illuminate\Http\Request;

class EscuderiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $escuderias = Escuderia::all();
        return view('admin/escuderia' , compact('escuderias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $escuderias = Escuderia::all();
        return view('admin/escuderia' , compact('escuderias'));
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
        $this->validate($request,[ 'nombre'=>'required']);
        $escuderia= Escuderia::create($request->all());
        $escuderia->visible = $request->has('visible');
        $escuderia->save();
   
        return redirect()->route('escuderias.create')->with('success','Registro creado satisfactoriamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escuderia  $escuderia
     * @return \Illuminate\Http\Response
     */
    public function show(Escuderia $escuderia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escuderia  $escuderia
     * @return \Illuminate\Http\Response
     */
    public function edit(Escuderia $escuderia)
    {
        //
        $escuderias = Escuderia::all();
        return view('admin/escuderia' , compact('escuderias','escuderia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escuderia  $escuderia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escuderia $escuderia)
    {
        //
         $this->validate($request,[ 'nombre'=>'required']);
        $escuderia->update($request->all());
        $escuderia->visible = $request->has('visible');
        $escuderia->save();
        
        return redirect()->route('escuderias.create')->with('success','Registro actualizado satisfactoriamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escuderia  $escuderia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escuderia $escuderia)
    {
        //
    }
}