<?php

namespace App\Http\Controllers;

use App\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pilotos = Participante::all()->sortby('nombre');
        return view('pilotos/pilotos', compact('pilotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$participantes = Participante::all()->sortby('nombre')->forPage(1, 12);
        $participantes = DB::table('participantes')->orderby('nombre')->paginate(10);
        return view('admin/participante', compact('participantes'));
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
        $this->validate($request, [
            'nombre' => 'required', 'apodo' => 'required',
            'imagen' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $participante = Participante::create($request->all());

        if ($request->has('imagenfile')) {

            // Get image file
            $image = $request->file('imagenfile');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('nombre')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $participante->imagen = $filePath;
        }

        $participante->visible = $request->has('visible');
        $participante->save();

        return redirect()->route('participantes.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function show(Participante $participante)
    {
        //
        $pilotos = Participante::all()->sortby('nombre');
        //$puntuaciones = $this->getPuntuacionCampeonatos($participante);
        return view('pilotos/resultado', compact('pilotos', 'participante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function edit(Participante $participante)
    {
        //
        // $participantes = Participante::all()->sortby('nombre');

        $participantes = DB::table('participantes')->orderby('nombre')->paginate(10);
        return view('admin/participante', compact('participantes', 'participante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participante $participante)
    {
        //
        $this->validate($request, [
            'nombre' => 'required', 'apodo' => 'required',
            'imagen' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->has('imagenfile')) {

            // Get image file
            $image = $request->file('imagenfile');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('nombre')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            // Borrado de imagen previa
            if ($participante->imagen) {
                $this->deleteOne($participante->imagen);
            }

            //dd($escuderia->imagen);
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $participante->imagen = $filePath;
        }



        $participante->fill($request->all());
        $participante->visible = $request->has('visible');
        $participante->save();

        return redirect()->route('participantes.create')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participante $participante)
    {
        //
        $participante->delete();

        return redirect()->route('participantes.create')->with('success', 'Registro actualizado satisfactoriamente');
    }
}