@extends('layout')

@section('title', 'Portada')

@section('content')
<!-- Masthead -->
<header class="masthead text-white text-center portada">
    <div class="overlay portada"></div>
    <div class="container"></div>
</header>

<!-- Icons Grid --
  <section class="features-icons bg-light text-center" -->
<section class="secciones-portada bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">


                    <a href="{{ route('campeonato.index')}}" class="secciones-enlace">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="../images/clasificacion.jpg" alt="Card image cap">
                            <div class="card-body  bg-light">

                                <h3>Campeonatos</h3>
                                <p class="lead mb-0">Campeonatos en curso</p>

                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">

                    <a href="/pilotos" class="secciones-enlace">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="../images/pilotos.jpg" alt="Card image cap">
                            <div class="card-body  bg-light">

                                <h3>Pilotos</h3>
                                <p class="lead mb-0">Pilotos disponibles</p>

                            </div>
                        </div>
                    </a>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="mx-auto mb-0 mb-lg-3">

                    <a href="/escuderias" class="secciones-enlace">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="../images/carreras.jpg" alt="Card image cap">
                            <div class="card-body bg-light">

                                <h3>Escuderias</h3>
                                <p class="lead mb-0">Escuderias disponibles</p>

                            </div>

                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection