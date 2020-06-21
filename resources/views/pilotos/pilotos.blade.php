@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center pilotos">
    <div class="overlay pilotos"></div>
    <div class="container"></div>
</header>




<section class="secciones-portada bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">


                <table class="table table-hover table-light">
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

                            <td><a href="{{ route('piloto.show', ['participante' => $piloto->id, ])}}"><i
                                        class="material-icons">timer</i></a></td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>


        </div>

    </div>
</section>




@endsection