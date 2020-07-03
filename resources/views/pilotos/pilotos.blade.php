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

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pilotos as $piloto)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$piloto->apodo}}</td>

                            <td><a 
                                  href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->slug ,'participante' => $piloto->id]) }}"><i
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