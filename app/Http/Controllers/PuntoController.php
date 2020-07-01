<?php

namespace App\Http\Controllers;

use App\ListaPunto;
use App\Punto;
use Illuminate\Http\Request;

class PuntoController extends Controller
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
        //
        $puntos = Punto::all();

        return view('admin/puntuacion', compact('puntos'));
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
        $punto = Punto::create($request->all());
        $punto->save();

        //Crear lista Puntos
        for ($i = 1; $i < 7; $i++) {
            $num = 'num' . $i;
            ListaPunto::create([
                'posicion' => $i,
                'puntos' => $request[$num],
                'punto_id' => $punto->id,
            ]);
        }

        return redirect()->route('puntos.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Punto  $punto
     * @return \Illuminate\Http\Response
     */
    public function show(Punto $punto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Punto  $punto
     * @return \Illuminate\Http\Response
     */
    public function edit(Punto $punto)
    {
        //
        $puntos = Punto::all();

        return view('admin/puntuacion', compact('puntos', 'punto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Punto  $punto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Punto $punto)
    {
        //
        //dd($request->all());
        $this->validate($request, ['nombre' => 'required']);
        $punto->fill($request->all());
        $punto->save();

        //Actualizar lista Puntos
        for ($i = 1; $i < 7; $i++) {
            $num = 'num' . $i;
            $listapunto = $punto->getPunto($i);
            $listapunto->puntos = $request[$num];
            $listapunto->save();
        }

        return redirect()->route('puntos.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Punto  $punto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Punto $punto)
    {
        //

        // dd($punto);
        $punto->delete();

        return redirect()->route('puntos.create')->with('success', 'Registro eliminado satisfactoriamente');
    }
}