<?php

namespace App\Http\Controllers;

use App\Escuderia;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//use Illuminate\Http\UploadedFile;
//use Illuminate\Support\Facades\Storage;

class EscuderiaController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $escuderias = Escuderia::all();
        return view('escuderias/escuderias', compact('escuderias'));
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
        return view('admin/escuderia', compact('escuderias'));
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $escuderia = Escuderia::create($request->all());
        //$escuderia->visible = $request->has('visible');


        if ($request->has('imagenfile')) {



            // Get image file
            $image = $request->file('imagenfile');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('nombre')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            //dd($escuderia->imagen);
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $escuderia->imagen = $filePath;
        }


        $escuderia->save();

        return redirect()->route('escuderias.create')->with('success', 'Registro creado satisfactoriamente');
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
        $escuderias = Escuderia::all();
        return view('escuderias.resultado', compact('escuderias', 'escuderia'));
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
        return view('admin/escuderia', compact('escuderias', 'escuderia'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
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
            if ($escuderia->imagen) {
                $this->deleteOne($escuderia->imagen);
            }

            //dd($escuderia->imagen);
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $escuderia->imagen = $filePath;
        }


        $escuderia->update($request->all());
        //$escuderia->visible = $request->has('visible');
        $escuderia->save();

        return redirect()->route('escuderias.create')->with('success', 'Registro actualizado satisfactoriamente');
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
        $escuderia->delete();

        return redirect()->route('escuderias.create')->with('success', 'Registro eliminado satisfactoriamente');
    }
}