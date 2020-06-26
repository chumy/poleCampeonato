@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center escuderia">
    <div class="overlay escuderia"></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista bg-light">

    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                <span class="navbar-brand mb-0 h1 d-none d-sm-block"><a href="{{ route('escuderia.index')}}" class="badge badge-light"><h5>Escuderia</h5></a> </span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$escuderia->nombre}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($escuderias as $esc)
                                    <a class="dropdown-item" href="{{ route('escuderia.show',['escuderia'=>$esc->id])}}">{{$esc->nombre}}</a>
                                    @endforeach
                                    
                                </div>
                            </li>
                        </ul>
                    </div>


            </div>
        </div>
    </div>




</section>


<section class="secciones-portada bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">


                <table class="table table-hover table-light">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Campeonato</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Puntos</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($escuderia->puntuacionCampeonatos() as $clas)

                        <tr>
                            <th scope="row">1</th>
                            <td><a href="{{ route('campeonato.show',['campeonato'=>$clas->campeonato->id , ]) }}" class="text-dark">{{$clas->campeonato->nombre}}</a></td>
                        <td>{{$clas->posicion}}</td>
                        <td>{{$clas->puntos_escuderia}}</td>
                        </tr>
                        @endforeach
                        


                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>


@endsection