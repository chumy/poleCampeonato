@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center escuderias">
    <div class="overlay "></div>
    <div class="container"></div>
</header>

<section class="campeonatos lista bg-light">

    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <span class="navbar-brand mb-0 h1"><a href="/campeonato" class=" badge badge-light">
                            <h5>Campeonato 1</h5>
                        </a></span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Escuderia 1
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="#">Escuderia 2</a>
                                    <a class="dropdown-item" href="#">Escuderia 3</a>
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
                            <th scope="col">Nombre</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row" rowspan="2">1</th>
                            <td rowspan="2">Carrera 1</td>
                            <td>1</td>
                            <td>Apodo 1</td>
                        </tr>
                        <tr>


                            <td>3</td>
                            <td>Apodo 3</td>
                        </tr>



                    </tbody>
                </table>


            </div>


        </div>

    </div>
</section>




@endsection