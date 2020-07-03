@extends('layout')

@section('title', 'Portada')

@section('content')



<section class="campeonatos lista">

    <div class="container">
        <div class="row">

            <!--div class="col-lg-4">

                
         

                    <div class="navbar ">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown grad">
                                <a class="dropdown-toggle navbar-brand" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$participante->nombre}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($campeonato->participantes as $part)
                                    @if ($part->id != $participante->id )
                                    <a class="dropdown-item"
                                        href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->slug ,'participante' => $part->id ]) }}">{{$part->apodo}}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>


            </div-->

            <div class="col-sm-3"></div>
            <div class="col-sm-6">

                <div class="card flex-row  card-escuderia">
                    <div class="card-header border-0 card-escuderia-image">
                       <img src="../../../images/casco_rojo.png" alt="" style="height: 200px;">
                    </div>
                    
                    <div class="card-block px-2">
                        <h4 class="card-title">{{$participante->nombre}}</h4>
                        
                    </div>
                    
                </div>

            </div>
            <div class="col-sm-3"></div>
        </div> 

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
                            <th scope="col">Posicion</th>
                            <th scope="col">Puntuacion</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clasificacion as $carrera)
                        <tr>
                            <th scope="row">{{$loop->iteration }}</th>
                            <td>{{$carrera->carrera->circuito->nombre}}</td>
                            <td>{{$carrera->posicion}}</td>
                            <td>{{$carrera->puntos()}}</td>
                        </tr>

                        @endforeach



                    </tbody>
                </table>

                <div class="text-right">
                    <h3> <span class="badge badge-secondary">Total: {{$clasificacion->sum(function($value){ return $value->puntos(); }) }} puntos</span>
                    </h3>
                </div>

            </div>


        </div>
<div class="col-sm-1"></div>
    </div>
</section>




@endsection