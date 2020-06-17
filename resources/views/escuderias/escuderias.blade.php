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

                        <tr>
                            <th scope="row">1</th>
                            <td>Escuderia 1</td>

                            <td><a href="/escuderias/resultado"><i class="material-icons">timer</i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Escuderia 2</td>

                            <td><a href="/escuderias/resultado"><i class="material-icons">timer</i></a></td>
                        </tr>



                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>




@endsection