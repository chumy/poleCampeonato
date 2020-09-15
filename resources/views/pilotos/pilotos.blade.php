@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center pilotos">
    <div class="overlay pilotos"></div>
    <div class="container"></div>
</header>




<section class="secciones-portada  text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-lg-10">


                <table class="table table-hover">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Piloto</th>
                            <th scope="col">Escuderia</th>
                            <th scope="col">Coche</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($inscritos as $inscrito)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$inscrito->participante->apodo}}</td>
                            <td>{{$inscrito->escuderia->nombre}}</td>
                            <td>{{$inscrito->coche->nombre}}</td>
                            <td><a 
                                  href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->slug ,'participante' => $inscrito->participante->id]) }}"><i
                                      ><i
                                        class="material-icons">timer</i></a></td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>


        </div>
        <div class="col-sm-1"></div>

    </div>
</section>




@endsection