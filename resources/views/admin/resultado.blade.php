@extends('admin/layout')

@section('title', 'Resultados')

@section('content')


@if (isset($campeonato->nombre) )

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <div class="btn-group">

                    <div class="dropdown show">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$campeonato->nombre}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($campeonatos as $camp)
                            <a class="dropdown-item"
                                href="{{ route('resultados.show', [ 'campeonato' =>$camp->id ]) }}">{{$camp->nombre}}</a>
                            @endforeach
                        </div>
                    </div>


                    <div class="dropdown show">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$carrera->circuito->nombre}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach ($campeonato->carreras as $car)
                            <a class="dropdown-item"
                                href="{{ route('resultados.show', [ 'campeonato' =>$campeonato->id , 'carrera' => $car->id, ]) }}">{{$car->circuito->nombre}}</a>
                            @endforeach

                        </div>
                    </div>

                </div>



                <p class="card-category"> Organiza el resultado de la carrera</p>
            </div>
            <div class="card-body">
                <div class="">


                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Coche
                            </th>
                            @if ($campeonato->pilotos)
                            <th>Piloto</th>
                            @endif
                            @if ($campeonato->escuderias || $campeonato->tipo == 2)
                            <th>Escuderia</th>
                            @endif
                            <th>Participacion</th>
                            <th>Abandono</th>
                            <th>
                            </th>
                        </thead>
                        <tbody>

                            @foreach ($carrera->getResultado() as $pos)
                            <tr>
                                <td>
                                    {{$pos->posicion}}
                                </td>
                                <td>
                                    {{$pos->participante()->apodo}}
                                </td>
                                <td>
                                    
                                    {{$pos->inscrito->coche->nombre}}
                                    
                                </td>
                                @if ($campeonato->pilotos)
                                <td>
                                    @if ($pos->inscrito->piloto)
                                    {{$pos->inscrito->piloto->nombre}}
                                    @endif
                                </td>
                                @endif
                                 @if ($campeonato->escuderias || $campeonato->tipo == 2)
                                <td>
                                    @if ($pos->inscrito->escuderia)
                                    {{$pos->inscrito->escuderia->nombre}}
                                    @endif
                                </td>
                                @endif
                                <td>

                                    <form
                                        action="{{ route('resultados.participacion',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id, 'resultado' => $pos->id , ] ) }}"
                                        method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox"
                                                    onClick="this.form.submit()" name="participacion"
                                                    value="{{$pos->participacion}}" @if($pos->participacion)
                                                checked
                                                @endif
                                                >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <form
                                        action="{{ route('resultados.abandono',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id, 'resultado' => $pos->id , ] ) }}"
                                        method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="abandono"
                                                    onClick="this.form.submit()" value="{{$pos->abandono}}"
                                                    @if($pos->abandono)
                                                checked
                                                @endif
                                                >
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="row">
                                        <form
                                            action="{{ route('resultados.up',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id, 'resultado' => $pos->id , ] ) }}"
                                            method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <button type="submit" rel="tooltip" title="Subir Posicion"
                                                class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">arrow_upward</i>
                                            </button>
                                        </form>
                                        <form
                                            action="{{ route('resultados.down',  [ 'campeonato' =>$campeonato->id , 'carrera' => $carrera->id, 'resultado' => $pos->id , ] ) }}"
                                            method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="PATCH">
                                            <button type="submit" rel="tooltip" title="Bajar Posicion"
                                                class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">arrow_downward</i>
                                            </button>
                                        </form>
                                     </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            
            
        </div>
        <form
             action="{{ route('resultados.publicar',  [  'campeonato' =>$campeonato->id , 'carrera' => $carrera->id] ) }}"
              method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
        <button type="submit" class="btn btn-primary btn-round">
           @if ($carrera->visible == 1)
            Ocultar Resultado
            @else
            Publicar Resultado
            @endif
        </button>
        </form>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12">No hay Campeonatos creados</div>
</div>

@endif
@endsection