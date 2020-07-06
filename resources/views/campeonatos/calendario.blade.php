@extends('layout')

@section('title', 'Calendario')

@section('content')


<section class="text-center">

    <div class="container">
        <div class="row">

            

            <div class="col-sm-3"></div>
            <div class="col-sm-6 grad" >

                <div class="card flex-row  card-calendario ">
                    @if($previous)
                   <div class="card-block px-2">
                        <a class="page-link" href="{{Route('campeonato.calendario', ['campeonato'=>$campeonato->slug , 'carrera'=>$previous->id]) }}">Previous</a>
                        
                    </div>
                    @endif
                    
                    <div class="card-block px-2 text-center">
                        <h4 class="card-title">{{$carrera->circuito->nombre}}</h4>
                    </div>
                    @if($next)
                     <div class="card-block px-2">
                        <a class="page-link" href="{{Route('campeonato.calendario', ['campeonato'=>$campeonato->slug , 'carrera'=>$next->id]) }}">Next</a>
                    </div>
                    @endif
                    
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div> 

    </div>


</section>



<section class="secciones-portada  text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <table class="table table-hover table-light">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Coche</th>
                            <th scope="col">Piloto</th>
                            @if($carrera->visible == 1 )
                            <th scope="col">Puntos</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carrera->resultados->sortby('posicion') as $clas)

                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$clas->inscrito->coche->nombre}}</td>
                        <td>{{$clas->inscrito->participante->apodo}}</td>
                         @if($carrera->visible == 1 )
                            <td>{{$clas->puntos()}}</td>
                        @endif
                        </tr>
                        @endforeach
                        


                    </tbody>
                </table>

            </div>


        </div>

    </div>
</section>


@endsection