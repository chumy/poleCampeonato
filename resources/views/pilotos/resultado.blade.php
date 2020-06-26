@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center piloto">
    <div class="overlay piloto"></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista bg-light">

    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <span class="navbar-brand mb-0 h1 d-none d-sm-block">Pilotos </span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$participante->apodo}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($pilotos as $piloto)
                                    @if ($piloto->id != $participante->id)
                                    <a class="dropdown-item"
                                        href="{{ route('piloto.show', ['participante'=> $piloto->id ])}}">{{$piloto->apodo}}</a>
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
                            <th scope="col">Campeonato</th>
                            <th scope="col">Posicion</th>
                            <th scope="col">Puntos</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participante->puntuacionCampeonatos() as $puntuacion)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{ Route ('campeonato.piloto', ['campeonato' => $puntuacion->inscrito->campeonato_id , 'participante' => $participante->id ])}}" class="text-dark"> {{$puntuacion->inscrito->campeonato->nombre}}</a>
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