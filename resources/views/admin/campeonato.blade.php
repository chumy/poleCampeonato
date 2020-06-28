@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Campeonatos</h4>
                <p class="card-category"> Gestión de todos los campeonatos disponibles</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                            </th>
                        </thead>
                        <tbody>

                            @foreach ($campeonatos as $camp)
                            <tr>
                                <td>
                                    {{ $camp->id}}
                                </td>
                                <td>
                                    {{ $camp->nombre}}
                                </td>

                                <td>

                                    <a rel="tooltip" href="{{ action('CampeonatoController@edit', $camp->id) }}" 
                                        title="Editar Campeonato"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                </a>
                                    <a type="button" rel="tooltip" title="Añadir Carreras"
                                        class="btn btn-primary btn-link btn-sm"
                                        href="{{ route('campeonatos.carrera', ['campeonato' => $camp->id]) }}">
                                        <i class="material-icons">location_ons</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Participantes"
                                        class="btn btn-primary btn-link btn-sm"
                                        onclick="window.location.href='/admin/campeonato/1/participantes'">
                                        <i class="material-icons">person</i>
                                    </button>

                                    <button type="button" rel="tooltip" title="Resultados"
                                        class="btn btn-primary btn-link btn-sm"
                                        onclick="window.location.href='/admin/resultados'">
                                        <i class="material-icons">list_alt</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Cambiar visibilidad"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <form action="{{ action('CampeonatoController@destroy', $camp->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" rel="tooltip" title="Eliminar Campeonato"
                                            class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Nuevo Campeonato</h4>
                <p class="card-category">Completa los campos para un nuevo campeonato</p>
            </div>
            <div class="card-body">
                @if(isset($campeonato))
                <form method="POST" action="{{ route('campeonatos.update',$campeonato->id) }}" role="form">

                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form method="POST" action="{{ route('campeonatos.store') }}" role="form">
                        @endif

                        {{ csrf_field() }}
                
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre</label>
                                <input type="text" name="nombre" class="form-control"
                                value="{{  (isset($campeonato->nombre) ? $campeonato->nombre : ''  ) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleSelect1" class="bmd-label-floating">Tipo</label>
                                <select class="form-control" id="exampleSelect1" name="tipo">
                                    <option value="1" {{  ( ( isset($campeonato->tipo) && ($campeonato->tipo == 1 ) ) ? 'selected' : ''  ) }}>Individual</option>
                                    <option value="2" {{  ( ( isset($campeonato->tipo) && ($campeonato->tipo == 2 ) ) ? 'selected' : ''  ) }}>Escuderias</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de coches</label>
                                <input type="text" name="num_coches" class="form-control"
                                value={{  (isset($campeonato->num_coches) ? $campeonato->num_coches : ''  ) }}>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de carreras</label>
                                <input type="text" name="num_carreras"  class="form-control"
                                value={{  (isset($campeonato->num_carreras) ? $campeonato->num_carreras : ''  ) }}>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de vueltas</label>
                                <input type="text" name="num_vueltas" class="form-control"
                                value={{  (isset($campeonato->num_vueltas) ? $campeonato->num_vueltas : ''  ) }}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="exampleSelect2" class="bmd-label-floating">Modelo de Puntuacion por
                                    defecto</label>
                                <select class="form-control" id="exampleSelect2" name="punto_id">
                                    @foreach ($puntos as $punto)
                                    
                                <option value="{{$punto->id}}"
                                    {{  ( ( isset($campeonato->punto_id) && ($campeonato->punto_id == $punto->id ) ) ? 'selected' : ''  ) }}
                                    >{{$punto->nombre}} - {{$punto->toText()}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Expansion Pilotos</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="pilotos"
                                                value="{{  (isset($campeonato->pilotos) ? $campeonato->pilotos : '0'  ) }}"
                                                {{ (isset($campeonato->pilotos) && ($campeonato->pilotos)) ? 'checked="checked"' : '' }}>

                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Expansion Escuderias</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="escuderias"
                                                value="{{  (isset($campeonato->escuderias) ? $campeonato->escuderias : '0'  ) }}"
                                                {{ (isset($campeonato->escuderias) && ($campeonato->escuderias)) ? 'checked="checked"' : '' }}>

                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <div class="form-group">
                                    <label class="bmd-label-floating"> Descripcion del Camepeonato.</label>
                                    <textarea class="form-control" rows="5" name="descripcion">
                                        {{ (isset($campeonato->descripcion) )  ? $campeonato->descripcion : '' }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="puntos_escuderia" class="bmd-label-floating">Puntuacion por Equipos</label>
                                <select class="form-control" id="puntos_escuderia" name="punto_escuderia_id">
                                       @foreach ($puntos as $punto)
                                    
                                <option value="{{$punto->id}}"
                                      {{  ( ( isset($campeonato->punto_escuderia_id) && ($campeonato->punto_escuderia_id == $punto->id ) ) ? 'selected' : ''  ) }}
                                    >{{$punto->nombre}} - {{$punto->toText()}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary pull-right">{{  (isset($campeonato->nombre) ? 'Modificar Campeonato': 'Nuevo Campeonato'  ) }}</button>
                    <div class="clearfix"></div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </form>
            </div>
        </div>
    </div>
</div>






@endsection