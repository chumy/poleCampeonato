@extends('layouts/campeonato')

@section('pagina', 'Piloto')

@section('content')



<section class="campeonatos lista">

    <div class="container">
        <div class="row">

     

            <div class="col-lg-1 d-none d-lg-block"></div>
            <div class="col-lg-10 col-md-10" >

                <div class="card flex-row  flex-wrap card-escuderia">
                    <div class="col-md-4 col-xs-3">
                    <div class="card-header border-0">
                    
                       <img class="image-desc img-thumbnail card-escuderia-image"  
                       src="{{ ($participante->imagen) ? asset($participante->imagen) : asset('images/person_8x10.png') }}" alt="">
                    </div>
                    </div>
                    <div class="col-md-8 col-xs-9">
                        <div class="card-block">
                    
                            <h4 class="card-title">{{$participante->nombre}}</h4>
                            <p class="card-title"><b>Coche:</b> {{$inscrito->coche->nombre}}</p>
                            @if($inscrito->escuderia)
                            <p class="card-title"><b>Escuderia:</b> {{$inscrito->escuderia->nombre}}</p>
                            <p class="card-text">{!! nl2br(e($inscrito->escuderia->descripcion))!!}</p>
                            @endif
                            @if($inscrito->piloto)
                            <p class="card-title"><b>Piloto:</b> {{$inscrito->piloto->nombre}}</p>
                            <p class="card-text">{!! nl2br(e($inscrito->piloto->descripcion))!!}</p>
                            @endif
                        </div>
                    </div>
                    
                        
                </div>

            </div>
            <div class="col-lg-1 d-none d-lg-block"></div>
        </div> 

        </div>
    </div>




</section>


<section class="secciones-portada text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 d-none d-lg-block"></div>
            <div class="col-lg-10">

                <div class="table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Posición</th>
                            <th scope="col">Puntuación</th>

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
</div>
                <div class="text-right">
                    <h3> <span class="badge badge-secondary">Total: {{$clasificacion->sum(function($value){ return $value->puntos(); }) }} puntos</span>
                    </h3>
                </div>

            </div>


        </div>
<div class="col-lg-1 d-none d-lg-block"></div>
    </div>
</section>




@endsection