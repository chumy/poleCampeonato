@extends('layout')

@section('title', 'Portada')

@section('content')



<section class="campeonatos lista">

    <div class="container">
        <div class="row">

     

            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="card flex-row  flex-wrap card-escuderia">
                    <div class="card-header border-0">
                       <img class="image-desc img-thumbnail card-escuderia-image"  
                       src="{{ ($participante->imagen) ? asset($participante->imagen) : asset('images/person_8x10.png') }}" alt="">
                    </div>
                    
                        <div class="card-block px-2">
                    
                            <h4 class="card-title">{{$participante->nombre}}</h4>
                            <p class="card-title">Coche: {{$inscrito->coche->nombre}}</p>
                            @if($inscrito->escuderia)
                            <p class="card-title">Escuderia: {{$inscrito->escuderia->nombre}}</p>
                            @endif
                            @if($inscrito->piloto)
                            <p class="card-title">Piloto: {{$inscrito->piloto->nombre}}</p>
                            @endif
                        </div>
                        
                    
                        
                </div>

            </div>
            <div class="col-sm-2"></div>
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