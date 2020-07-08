<?php

namespace App\Http\Controllers;

use App\Coche;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CocheController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $coches = Coche::all();
        return view('admin/coche', compact('coches'));
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
            'imagen' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $coche = Coche::create($request->all());


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
            $coche->imagen = $filePath;
        }



        $coche->save();

        return redirect()->route('coche.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coche)
    {
        //
        $coches = Coche::all();
        return view('admin/coche', compact('coches', 'coche'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coche)
    {
        //

        $this->validate($request, [
            'nombre' => 'required',
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
            if ($coche->imagen) {
                $this->deleteOne($coche->imagen);
            }

            //dd($escuderia->imagen);
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $coche->imagen = $filePath;
        }


        $coche->fill($request->all());
        $coche->save();

        return redirect()->route('coche.create')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coche)
    {
        //
        $coche->delete();

        return redirect()->route('coche.create')->with('success', 'Registro eliminado satisfactoriamente');
    }
}