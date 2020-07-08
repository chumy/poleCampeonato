@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center piloto">
    <div class="overlay piloto"></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista">

    <div class="container">
        <div class="row">

           
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="card flex-row  card-escuderia">
                    <div class="card-header border-0 card-escuderia-image">
                       <img src="../../../images/lotus.png" alt="" style="height: 200px;">
                    </div>
                    
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$participante->apodo}}</h4>
                        
                    </div>
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$participante->apodo}}</h4>
                        
                    </div>
                </div>

            </div>
            <div class="col-sm-3"></div>
        </div> 

        </div>
    </div>




</section>



<section class="secciones-portada  text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">


                <table class="table table-hover ">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Campeonato</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Puntos</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participante->puntuacionCampeonatos() as $puntuacion)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{ Route ('campeonato.piloto', ['campeonato' => $puntuacion->inscrito->campeonato->slug , 'participante' => $participante->id ])}}" class="text-dark"> {{$puntuacion->inscrito->campeonato->nombre}}</a>
                            </td>
                            <td>{{$puntuacion->posicion}}</td>
                        <td>{{$puntuacion->puntos}}</td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>


@endsection