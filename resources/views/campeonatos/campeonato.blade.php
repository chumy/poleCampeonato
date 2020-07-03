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
                                        href="{{ route('campeonato.show', ['id' => $camplist->slug ]) }}">{{$camplist->nombre}}</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>


            </div>
        </div>
    </div>




</section>

@include('campeonatos.descripcion')








@endsection