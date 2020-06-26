@extends('layout')

@section('title', 'Portada')

@section('content')

<!-- Masthead -->
<header class="masthead text-white text-center escuderias">
    <div class="overlay "></div>
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
                            <th scope="col">Escuderia</th>

                            <th></th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($escuderias->sortby('nombre') as $esc)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$esc->nombre}}</td>

                            <td><a href="{{route('escuderia.show', ['escuderia'=>$esc->id, ])}}"><i class="material-icons">timer</i></a></td>
                        </tr>
                        @endforeach
        


                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>




@endsection