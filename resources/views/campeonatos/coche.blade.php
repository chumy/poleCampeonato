@extends('layout')

@section('title', 'Portada')

@section('content')



<section class="campeonatos lista">

    <div class="container">
        <div class="row">

            

            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="card flex-row  card-escuderia">
                    <div class="card-header border-0 card-escuderia-image">
                       <img src=" {{($coche->imagen) ? $coche->imagen : asset('images/person_8x10.png')}} " alt="" style="height: 200px;">
                    </div>
                    
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$coche->nombre}}</h4>
                        
                    </div>
                    
                </div>

            </div>
            <div class="col-sm-3"></div>
        </div> 

        </div>
    </div>




</section>


<section class="secciones-portada text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">


                <table class="table table-hover">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Puntuacion</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clasificacion as $carrera)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$carrera->carrera->circuito->nombre}}</td>
                            <td>{{$carrera->posicion}}</td>
                            <td>{{$carrera->puntos()}}</td>
                        </tr>

                        @endforeach



                    </tbody>
                </table>

                <div class="text-right">
                    <h3> <span class="badge badge-secondary">Total: {{$clasificacion->sum(function($value){ return $value->puntos(); }) }} puntos</span>
                    </h3>
                </div>

            </div>


        </div>
<div class="col-sm-1"></div>
    </div>
</section>




@endsection