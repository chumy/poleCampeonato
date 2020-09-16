@extends('layouts/campeonato')




@section('content')

<!-- Clasificacion -->


                        

<section class="secciones-portada text-center">
    <div class="container">
        <div class="row">

            @if ($campeonato->tipo == 2)
                <div class="col-xs-8 px-1">
            @else
                <div class="col-lg-10">
            @endif

                    <table class="table table-hover ">
                        <thead>
                            <tr class="thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Coche</th>
                                <th scope="col">Nombre</th>
                            
                                @if ($campeonato->pilotos)
                                <th scope="col">Piloto</th>
                                @endif
                                <th><!-- Punt individual --></th>
                                @if ($campeonato->escuderias)
                                <th scope="col">Escuderia</th>
                                @endif

                                <th scope="col">Puntuacion</th>
                                <th><!-- Punt total --></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if ( $campeonato->getClasificacion()->count() > 0) 
                           
                            @foreach($campeonato->getClasificacion() as $clasif)
                            <tr>
                                <th scope="row" rowspan="{{$clasif->inscritos->count()}}">{{$loop->iteration}}</th>
                                <td rowspan="{{$clasif->inscritos->count()}}" >{{$clasif->coche->nombre}}</td>
                                @foreach ($clasif->inscritos as $inscrito)
                                    @if ( $loop->iteration > 1)
                                        <tr>
                                    @endif

                                    
                                    <td >{{$inscrito->participante->apodo}}</td>
                                    
                                    @if ($campeonato->pilotos)
                                    <td>
                                        @if ($inscrito->piloto)
                                        {{$inscrito->piloto->nombre}}
                                    @endif
                                    </td>
                                    @endif
                                <td>
                                    @if ($clasif->inscritos->count() > 1)
                                <a href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->slug ,'participante' => $inscrito->participante->id]) }}"><i
                                            class="material-icons">timer</i></a>
                                @endif
                                </td>

                                @if ( $loop->iteration == 1)
                                    @if ($campeonato->escuderias)
                                    <td rowspan="{{$clasif->inscritos->count()}}">{{$inscrito->escuderia->nombre}}</td>
                                    @endif

                                <td  rowspan="{{$clasif->inscritos->count()}}">{{$clasif->puntos}}
                                @if ($campeonato->tipo == 2 || $campeonato->tipo == 3  )
                                    ({{$clasif->puntos_pilotos}}+{{$clasif->puntos_esc}}) 

                                @endif
                                </td>
                                <td rowspan="{{$clasif->inscritos->count()}}"><a
                                        href="{{ route('campeonato.coche', [ 'campeonato' =>$campeonato->slug ,'coche' => $inscrito->coche]) }}"><i
                                            class="material-icons">timer</i></a>
                                </td>
                                @endif
                                @if ( $loop->iteration > 1)
                            </tr>
                                @endif
                                @endforeach
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>


                </div>
                @if ($campeonato->tipo == 2)
                <div class="col-xs-4 px-1">



                    <table class="table table-hover">
                        <thead>
                            <tr class="thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Escuderia</th>
                                <th scope="col">Puntuacion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($campeonato->getClasificacionEscuderias()->count() > 0)
                            @foreach($campeonato->getClasificacionEscuderias() as $clasifEsc)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $clasifEsc->escuderia->nombre }}</td>
                                <td>{{ $clasifEsc->puntos}} ({{$clasifEsc->puntos_escuderia }}) </td>
                                <td><a
                                        href="{{ route('campeonato.escuderia', [ 'campeonato' =>$campeonato->slug ,'escuderia' => $clasifEsc->escuderia->id  ]) }}"><i
                                            class="material-icons">timer</i></a></td>
                            </tr>

                            @endforeach
                            @endif
                        </tbody>
                    </table>


                </div>
                @endif


            </div>
        </div>
</section>





@endsection