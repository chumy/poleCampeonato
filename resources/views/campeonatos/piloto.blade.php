@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center pilotos">
    <div class="overlay pilotos"></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista bg-light">

    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <span class="navbar-brand mb-0 h1"><a href="{{ route('campeonato.index', ['campeonato' =>$campeonato->id])}}" class=" badge badge-light">
                            <h5>{{ $campeonato->nombre }}</h5></a></span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$participante->nombre}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($campeonato->participantes as $part)
                                    @if ($part->id != $participante->id )
                                    <a class="dropdown-item"
                                        href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->id ,'participante' => $part->id ]) }}">{{$part->apodo}}</a>
                                    @endif
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

    </div>
</section>




@endsection