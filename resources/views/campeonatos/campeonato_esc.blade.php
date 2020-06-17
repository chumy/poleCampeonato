@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center clasificacion">
    <div class="overlay clasificacion"></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista bg-light">

    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <span class="navbar-brand mb-0 h1">Campeonato </span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Campeonato Escuderias Verano 2020
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/campeonato">Campeonato Pilotos Verano 2020</a>
                                    <a class="dropdown-item" href="/campeonato2">Campeonato Inidividual Julio 2020</a>
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
                    Campeonato Escuderias Verano 2020
                </h3>

                <div class=" blog-post text-left">

                    <p>Bienvenido al campeonato veraniego de 2020. Un campeonato por pilotos</p>
                    <hr>

                    <h5>Formato</h5>
                    <dl class="row">
                        <dt class="col-sm-3">Número de coches</dt>
                        <dd class="col-sm-3">6</dd>
                        <dt class="col-sm-3">Número de carreras</dt>
                        <dd class="col-sm-3">5</dd>
                        <dt class="col-sm-3">Vueltas por carreras</dt>
                        <dd class="col-sm-3">12</dd>
                        <dt class="col-sm-3">Penalización por abandono</dt>
                        <dd class="col-sm-3">50%</dd>

                        <dt class="col-sm-3">Pilotos</dt>
                        <dd class="col-sm-3">Habilitados</dd>
                        <dt class="col-sm-3">Escuderias</dt>
                        <dd class="col-sm-3">Habilitados</dd>

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

    </div>
</section>



<section class="secciones-portada bg-light text-center">
    <div class="container">

        <div class="row">


            <div class="col-lg-6">

                <table class="table table-hover table-light">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Escuderia</th>
                            <th scope="col">Puntuacion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">1</th>
                            <td>Apodo 1</td>
                            <td>Escuderia 1</td>
                            <td>21 (20 + 1) </td>
                            <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Apodo 2</td>
                            <td>Escuderia 1</td>
                            <td>11 (10 + 1) </td>
                            <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>

                        </tr>

                        <th scope="row">1</th>
                        <td>Apodo 3</td>
                        <td>Escuderia 2</td>
                        <td>20 (10 + 10) </td>
                        <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>

                        </tr>

                    </tbody>
                </table>


            </div>
            <div class="col-lg-4">



                <table class="table table-hover table-light">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Escuderia</th>
                            <th scope="col">Puntuacion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row">1</th>
                            <td>Escuderia 1</td>
                            <td>1 </td>
                            <td><a href="/campeonato/escuderia"><i class="material-icons">timer</i></a></td>
                        </tr>


                        <th scope="row">2</th>
                        <td>Escuderia 2</td>
                        <td>10</td>
                        <td><a href="/campeonato/escuderia"><i class="material-icons">timer</i></a></td>

                        </tr>

                    </tbody>
                </table>


            </div>


        </div>
    </div>
</section>


@endsection