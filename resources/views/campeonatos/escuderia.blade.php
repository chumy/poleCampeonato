@extends('layout')

@section('title', 'Portada')

@section('content')


<section class="campeonatos lista ">

    <div class="container">
        <div class="row text-center">

            <!--div class="col-lg-4">

                <nav class="navbar navbar-expand-lg navbar-light ">


                    <span class="navbar-brand mb-0 h1 "><a href="{{ Route ('campeonato.index',['campeonato' => $campeonato->slug ]) }}" class=" badge badge-light">
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


            </div-->
            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="card flex-row flex-wrap card-escuderia">
                    <div class="card-header border-0 card-escuderia-image">
                       <img src="{{ ($escuderia->imagen) ? $escuderia->imagen : asset('images/person_8x10.png') }}" alt="" style="height: 200px;">
                    </div>
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$escuderia->nombre}}</h4>
                        <p class="card-text">{{$escuderia->descripcion}}</p>
                    </div>
                    <div class="w-100"></div>
                </div>

            </div>
            <div class="col-sm-3"></div>
        </div> 
    </div>




</section>


<section class="secciones-portada text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">


                <table class="table table-hover">
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
<div class="col-sm-1"></div>

        </div>

    </div>
</section>




@endsection