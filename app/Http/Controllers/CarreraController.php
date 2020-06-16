<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carreras = Carrera::all();
        return view('admin/carrera' , compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carreras = Carrera::all();
        return view('admin/carrera' , compact('carreras'));
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
        $carrera= Carrera::create($request->all());
        $carrera->visible = $request->has('visible');
        $carrera->save();
   
        return redirect()->route('carreras.create')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        $carreras = Carrera::all();
        return view('admin/carrera' , compact('carreras','carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
        $this->validate($request,[ 'nombre'=>'required']);
        $carrera->update($request->all());
        $carrera->visible = $request->has('visible');
        $carrera->save();
        
        return redirect()->route('carreras.create')->with('success','Registro actualizado satisfactoriamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
       $carrera->delete();
       
       return redirect()->route('carreras.create')->with('success','Registro eliminado satisfactoriamente');
    }
}