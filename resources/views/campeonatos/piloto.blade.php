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


                    <span class="navbar-brand mb-0 h1">Campeonato 1</span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Apodo 1
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="#">Apodo 2</a>
                                    <a class="dropdown-item" href="#">Apodo 3</a>
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

                        <tr>
                            <th scope="row">1</th>
                            <td>Carrera 1</td>
                            <td>1</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Carrera 2</td>
                            <td>3</td>
                            <td>15</td>
                        </tr>



                    </tbody>
                </table>

                <div class="text-right">
                    <h3> <span class="badge badge-secondary">Total: 35 puntos</span> </h3>
                </div>

            </div>


        </div>

    </div>
</section>




@endsection