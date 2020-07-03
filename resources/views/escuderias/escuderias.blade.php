@extends('layout')

@section('title', 'Portada')

@section('content')





<section class="secciones-portada text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">


                <table class="table table-hover">
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

                            <td><a 
                                 href="{{ route('campeonato.escuderia', [ 'campeonato' =>$campeonato->slug ,'escuderia' => $esc->id  ]) }}"><i
                                       ><i class="material-icons">timer</i></a></td>
                        </tr>
                        @endforeach
        


                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>




@endsection