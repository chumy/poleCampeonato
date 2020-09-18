@extends('layouts/campeonato')

@section('pagina', 'Calendario')

@section('content')


<section class="text-center">

    <div class="container">
        <div class="row">

            

            <div class="col-sm-2 d-none d-sm-block"></div>
            <div class=" col-sm-8  grad" >

                <div class="card flex-row  card-calendario ">
                    
                   <div class="card-block px-2  text-center col-sm-2">
                       @if($previous)
                        <a  class="card-direction" href="{{Route('campeonato.calendario', ['campeonato'=>$campeonato->slug , 'carrera'=>$previous->id]) }}">
                         <i class="material-icons card-direction ">navigate_before</i></a>
                       @endif 
                    </div>
                    
                    
                    <div class="card-block px-2 text-center col-sm-8">
                        <h5 class="card-title "><p>{{$carrera->fecha}}</p> {{$carrera->circuito->nombre}}</h5>
                    </div>
                    
                     <div class="card-block text-center align-middle px-2 col-sm-2">
                         @if($next)
                        <a class="card-direction" href="{{Route('campeonato.calendario', ['campeonato'=>$campeonato->slug , 'carrera'=>$next->id]) }}">
                        <i class="material-icons card-direction ">navigate_next</i></a>
                        @endif
                    </div>
                    
                    
                </div>
            </div>
            <div class="col-sm-2 d-none d-sm-block"></div>
        </div> 

    </div>


</section>



<section class="secciones-portada  text-center">
    <div class="container">
        <div class="row">
            <div class="table-responsive">


                <table class="table table-hover ">
                    <thead>
                        <tr class="thead-dark">
                            @if($carrera->visible == 1 )
                            <th scope="col">#</th>
                            @endif
                            <th scope="col">Coche</th>
                            <th scope="col">Nombre</th>
                             @if ($campeonato->pilotos)
                                <th scope="col">Piloto</th>
                                @endif
                                
                                @if ($campeonato->escuderias)
                                <th scope="col">Escudería</th>
                                @endif
                            @if($carrera->visible == 1 )
                            <th scope="col">Puntos</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carrera->resultados->where('participacion',1)->sortby('posicion') as $clas)

                        <tr>
                            @if($carrera->visible == 1 )
                        <th scope="row">{{$loop->iteration}}</th>
                        @endif
                        <td>{{$clas->inscrito->coche->nombre}}</td>
                        <td>{{$clas->inscrito->participante->apodo}}</td>
                         @if ($campeonato->pilotos)
                                    <td>
                                        @if ($clas->inscrito->piloto)
                                        {{$clas->inscrito->piloto->nombre}}
                                        @endif
                                    </td>
                                    @endif

                                    @if ($campeonato->escuderias)
                                    <td>{{$clas->inscrito->escuderia->nombre}}</td>
                                    @endif
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