@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center campeonato">
    <div class="overlay campeonato"></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista bg-light">

    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <span class="navbar-brand mb-0 h1 d-none d-sm-block">Campeonato </span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $campeonato->nombre}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($campeonatos as $camplist)
                                    <a class="dropdown-item"
                                        href="{{ route('campeonato.show', ['id' => $camplist->id ]) }}">{{$camplist->nombre}}</a>
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
            <div class="col-md-8 blog-main">
                <h3 class=" pb-3 mb-4 font-italic border-bottom ">
                    {{ $campeonato->nombre}}
                </h3>

                <div class=" blog-post text-left">

                    <p>{{ $campeonato->descripcion}}</p>
                    <hr>

                    <h5>Formato</h5>
                    <dl class="row">
                        <dt class="col-sm-3">Número de coches</dt>
                        <dd class="col-sm-3">{{ $campeonato->coches}}</dd>
                        <dt class="col-sm-3">Número de carreras</dt>
                        <dd class="col-sm-3">{{ $campeonato->carreras}}</dd>
                        <dt class="col-sm-3">Vueltas por carreras</dt>
                        <dd class="col-sm-3">{{ $campeonato->vueltas}}</dd>
                        <dt class="col-sm-3">Penalización por abandono</dt>
                        <dd class="col-sm-3">50%</dd>

                        <dt class="col-sm-3">Pilotos</dt>
                        <dd class="col-sm-3">{{ ($campeonato->pilotos) ? 'Habilitados' : 'Deshabilitados' }}</dd>
                        <dt class="col-sm-3">Escuderias</dt>
                        <dd class="col-sm-3">{{ ($campeonato->escuderias) ? 'Habilitadas' : 'Deshabilitadas' }}</dd>

                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>

                        <dt class="col-sm-3">Puntuación</dt>
                        <dd class="col-sm-9">
                            @foreach ($campeonato->puntuaciones->puntos as $punto)
                            @if(!$loop->last)
                            {{$punto->puntos}} -
                            @else
                            {{$punto->puntos}}
                            @endif
                            @endforeach

                        </dd>

                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>
                        @foreach ($carreasEspeciales as $carreasEspeciales )
                        <dt class="col-sm-3">Puntuación especial Carrera {{$carreasEspeciales->orden}}</dt>
                        <dd class="col-sm-9">
                            @foreach ($puntosEspeciales[$loop->index]->puntos as $punto)
                            @if(!$loop->last)
                            {{$punto->puntos}} -
                            @else
                            {{$punto->puntos}}
                            @endif
                            @endforeach

                        </dd>
                        @endforeach

                    </dl>
                    <hr>

                </div><!-- /.blog-post -->
            </div>
        </div>


</section>

<section class="secciones-portada bg-light text-center">
    <div class="container">
        <div class="row">

            @if ($campeonato->tipo == 2)
            <div class="col-lg-6">
                @else
                <div class="col-lg-10">
                    @endif

                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                @if ($campeonato->pilotos)
                                <th scope="col">Pilotos</th>
                                @endif
                                @if ($campeonato->escuderias)
                                <th scope="col">Escuderias</th>
                                @endif

                                <th scope="col">Puntuacion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clasificacionCampeonato as $clasif)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$clasif->apodo}}</td>
                                @if ($campeonato->pilotos)
                                <td>{{$clasif->piloto}}</td>
                                @endif
                                @if ($campeonato->escuderias)
                                <td>{{$clasif->escuderia}}</td>
                                @endif
                                @if ($campeonato->tipo == 2)

                                <td>{{$clasif->puntosTotales}}
                                    ({{$clasif->puntos}} + {{$clasif->puntosEscuderia}} ) </td>

                                @else
                                <td>{{$clasif->puntos}}</td>
                                @endif
                                <td><a
                                        href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->id ,'participante' => $clasif->id ]) }}"><i
                                            class="material-icons">timer</i></a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>


                </div>
                @if ($campeonato->tipo == 2)
                <div class="col-lg-4">



                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Escuderia</th>
                                <th scope="col">Posicion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clasificacionEscuderias as $clasifEsc)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $clasifEsc->escuderia }}</td>
                                <td>{{ $clasifEsc->posicion }} </td>
                                <td><a href="/campeonato/escuderia/{{$clasifEsc->id}}"><i
                                            class="material-icons">timer</i></a></td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>


                </div>
                @endif


            </div>
        </div>
</section>



@endsection