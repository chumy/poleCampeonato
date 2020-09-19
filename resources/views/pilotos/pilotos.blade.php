@extends('layouts/campeonato')

@section('pagina','Pilotos')

@section('content')



<section class="secciones-portada text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

<div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            @if ($campeonato->pilotos)
                                <th scope="col" class="d-none d-sm-table-cell">Piloto</th>
                                @endif
                             @if ($campeonato->escuderias)
                                <th scope="col" class="d-none d-sm-table-cell">Escudería</th>
                                @endif
                            <th scope="col" class="d-none d-sm-table-cell" >Coche</th>
                            <th><!-- Punt Ind--></th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($inscritos as $inscrito)
                        <tr class="">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$inscrito->participante->apodo}}</td>
                            @if ($campeonato->pilotos) 
                                <td class="d-none d-sm-table-cell">
                                    @if ($inscrito->piloto)
                                    {{$inscrito->piloto->nombre}}
                                    @endif
                                </td>
                            @endif
                            @if ($campeonato->escuderias)   
                                <td class="d-none d-sm-table-cell">
                                    @if ($inscrito->escuderia)
                                    {{$inscrito->escuderia->nombre}}
                                    @endif
                                </td>
                            @endif
                            <td class="d-none d-sm-table-cell">{{$inscrito->coche->nombre}}</td>
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


        </div>
        <div class="col-sm-1"></div>

    </div>
</section>




@endsection