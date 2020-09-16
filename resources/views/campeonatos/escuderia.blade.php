@extends('layouts/campeonato')

@section('title', 'Portada')

@section('content')


<section class="campeonatos lista ">

    <div class="container">
        <div class="row text-center">

            
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="card flex-row flex-wrap card-escuderia">
                    <div class="card-header border-0 ">
                       <img class="image-desc img-thumbnail card-escuderia-image" 
                       src="{{ ($escuderia->imagen) ? asset($escuderia->imagen) : asset('images/escuderia_blank.jpg') }}" alt="" style="height: 200px;">
                    </div>
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$escuderia->nombre}}</h4>
                        <p class="card-text">{{$escuderia->descripcion}}</p>

                        <h4 class="card-title">Pilotos</h4>
                        @foreach ($inscritos as $inscrito )
                        <p class="card-text">{{$inscrito->participante->apodo}} ({{$inscrito->coche->nombre}})</p>
                           
                        @endforeach


                    </div>
                   
                </div>

            </div>
            <div class="col-sm-2"></div>
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
                            <th scope="col">Puntos</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campeonato->getResultadosEscuderias()->where('escuderia',$escuderia)->sortBy('carrera.orden') as $car)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$car->carrera->circuito->nombre}}</td>
                            <td>{{$car->puntos}}</td>
                            
                        </tr>

                        @endforeach





                    </tbody>
                </table>


            </div>
<div class="col-sm-1"></div>

        </div>

    </div>
</section>




@endsection