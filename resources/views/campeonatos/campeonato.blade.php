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
                        <dd class="col-sm-3">{{ ($campeonato->pilotos) ? 'Habilitadas' : 'Deshabilitadas' }}</dd>

                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>

                        <dt class="col-sm-3">Puntuación</dt>
                        <dd class="col-sm-3">
                            <p>1. 10 puntos</p>
                            <p>2. 8 puntos</p>
                            <p>3. 6 puntos</p>

                        </dd>
                        <dd class="col-sm-3">
                            <p>4. 5 puntos</p>
                            <p>5. 4 puntos</p>
                            <p>6. 3 puntos</p>

                        </dd>
                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>
                        <dt class="col-sm-3">Puntuación especial Carrera 5</dt>
                        <dd class="col-sm-3">
                            <p>1. 15 puntos</p>
                            <p>2. 12 puntos</p>
                            <p>3. 10 puntos</p>

                        </dd>
                        <dd class="col-sm-3">
                            <p>4. 8 puntos</p>
                            <p>5. 6 puntos</p>
                            <p>6. 5 puntos</p>

                        </dd>

                    </dl>
                    <hr>

                </div><!-- /.blog-post -->
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Piloto</th>
                            <th scope="col">Puntuacion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">1</th>
                            <td>Apodo 1</td>
                            <td>Piloto 1</td>
                            <td>20</td>
                            <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Apodo 2</td>
                            <td>Piloto 2</td>
                            <td>18</td>
                            <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Apodo 3</td>
                            <td>Piloto 3</td>
                            <td>13</td>
                            <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td>Apodo 4</td>
                            <td>Piloto 5</td>
                            <td>12</td>
                            <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
                        </tr>


                    </tbody>
                </table>


            </div>



        </div>
    </div>
</section>



@endsection