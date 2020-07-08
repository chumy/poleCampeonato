@extends('layout')

@section('title', 'Calendario')

@section('content')


<section class="text-center">

    <div class="container">
        <div class="row">

            

            <div class="col-sm-3"></div>
            <div class="col-sm-6 grad" >

                <div class="card flex-row  card-calendario ">
                    
                   <div class="card-block px-2  text-center col-sm-3">
                       @if($previous)
                        <a  class="card-direction" href="{{Route('campeonato.calendario', ['campeonato'=>$campeonato->slug , 'carrera'=>$previous->id]) }}">
                         <i class="material-icons card-direction ">navigate_before</i></a>
                        @endif
                    </div>
                    
                    
                    <div class="card-block px-2 text-center col-sm-6">
                        <h4 class="card-title ">{{$carrera->fecha}} {{$carrera->circuito->nombre}}</h4>
                    </div>
                    
                     <div class="card-block text-center align-middle px-2 col-sm-3">
                         @if($next)
                        <a class="card-direction" href="{{Route('campeonato.calendario', ['campeonato'=>$campeonato->slug , 'carrera'=>$next->id]) }}">
                        <i class="material-icons card-direction ">navigate_next</i></a>
                        @endif
                    </div>
                    
                    
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


                <table class="table table-hover ">
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
                        @foreach($carrera->resultados->where('participacion',1)->sortby('posicion') as $clas)

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