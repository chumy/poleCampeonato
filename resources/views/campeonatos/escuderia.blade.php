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


                    <span class="navbar-brand mb-0 h1 "><a href="{{ Route ('campeonato.index',['campeonato' => $campenato->id ]) }}" class=" badge badge-light">
                            <h5>{{$campeonato->nombre}}</h5>
                        </a></span>

                    <div class="navbar" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$escuderia->nombre}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($campeonato->escuderias()->get() as $esc)
                                    @if ($esc->id <> $escuderia->id)

                                        <a class="dropdown-item"
                                            href="{{ route ('campeonato.escuderia',  [ 'campeonato' =>$campeonato->id , 'escuderia' => $esc->id, ] ) }}">{{$esc->nombre}}</a>
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
                            <th scope="col">Puntos</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campeonato->getResultadosEscuderias()->where('escuderia',$escuderia) as $car)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$car->carrera->circuito->nombre}}</td>
                            <td>{{$car->puntos}}</td>
                            
                        </tr>

                        @endforeach





                    </tbody>
                </table>


            </div>


        </div>

    </div>
</section>




@endsection