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


                    <span class="navbar-brand mb-0 h1 d-none d-sm-block">Pilotos </span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Apodo 1
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/pilotos/resultado">Apodo 2</a>
                                    <a class="dropdown-item" href="/pilotos/resultado">Apodo 3</a>
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

                        <tr>
                            <th scope="row">1</th>
                            <td><a href="/campeonato/piloto" class="text-dark"> Campeonato Verano 2020</a>
                            </td>
                            <td>1</td>
                            <td>40</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><a href="/campeonato/piloto" class="text-dark"> Campeonato Escuderias 2020</a></td>
                            <td>2</td>
                            <td>38</td>
                        </tr>



                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>


@endsection