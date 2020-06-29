@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Listado de Carreras del Campeonato {{$campeonato->nombre}}</h4>
                <p class="card-category"> Gestión de todas la carreras disponibles para el campeonato</p>
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
                            <th>Puntuacion
                            </th>
                            <th>
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($campeonato->carreras as $car)
                            <tr>
                                <td>{{$car->orden}}</td>
                                <td>
                                    {{$car->circuito->nombre}}
                                </td>
                                <td>{{$car->puntos->nombre}} {{$car->puntos->toText()}}</td>
                                <td>
                                    <div class="row">
                                    <form
                                        action="{{ route('carreras.up',  [ 'carrera' =>$car->id  ] ) }}"
                                        method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <button type="submit" rel="tooltip" title="Subir Posicion"
                                            class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">arrow_upward</i>
                                        </button>
                                    </form>

                                    <form
                                        action="{{ route('carreras.down',  [ 'carrera' =>$car->id  ] ) }}"
                                        method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <button type="submit" rel="tooltip" title="Bajar Posicion"
                                            class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">arrow_downward</i>
                                        </button>
                                    </form>

                                    <form action="{{ action('CarreraController@destroy', $car->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" rel="tooltip" title="Eliminar Carrera"
                                            class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
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
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title">Agregar Carrera al {{$campeonato->nombre}}</h4>
                <p class="card-category">Añadir carreras al campeonato</p>
            </div>
            <div class="card-body">
                @if(isset($carrera))
                    <form method="POST" action="{{ route('carreras.update',['carrera' => $carrera->id]) }}" role="form">
                    <input name="_method" type="hidden" value="PATCH">
                @else
                    <form method="POST" action="{{ route('carreras.store') }}" role="form">
                @endif
                        {{ csrf_field() }}

                    <input name="campeonato_id" type="hidden" value="{{$campeonato->id}}">
                    <div class="row">
                        <div class="col-md-5">

                            <div class="form-group">
                                <label for="circuito_id" class="bmd-label-floating">Carrera</label>

                                <select class="form-control" id="circuito_id" name="circuito_id">
                                    @foreach ($circuitos as $cir)
                                    <option value="{{$cir->id}}">{{$cir->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="punto_id" class="bmd-label-floating">Modelo de Puntuacion</label>
                                <select class="form-control" id="punto_id" name="punto_id">
                                    @foreach ($puntos as $punto)
                                    <option value={{$punto->id}}
                                        @if ($campeonato->punto_id == $punto->id)
                                         selected
                                        @endif
                                        >{{$punto->nombre}} - {{$punto->toText()}}</option>
                                     @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Añadir Carrera</button>
                    <div class="clearfix"></div>


                </form>
            </div>
        </div>
    </div>

</div>




@endsection