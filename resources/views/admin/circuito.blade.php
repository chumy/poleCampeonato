@extends('admin/layout')

@section('title', 'Circuitos')

@section('content')


<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Carreras</h4>
                <p class="card-category"> Gestión de todas la carreras disponibles</p>
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
                            @foreach ($circuitos as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->nombre }}</td>

                                <td>

                                    <a rel="tooltip" href="{{ action('CircuitoController@edit', $car->id) }}"
                                        title="Editar Circuito" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a rel="tooltip" title="{{ ($car->visible) ? 'Visible' : 'No visible' }}"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i
                                            class="material-icons">{{ ($car->visible) ? 'visibility' : 'visibility_off' }}</i>
                                    </a>
                                    <form action="{{ action('CircuitoController@destroy', $car->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" rel="tooltip" title="Eliminar Carrera"
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

    <div class="col-md-6">

        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Nuevo Circuito</h4>
                <p class="card-category">Rellena informacion de un nuevo circuito</p>
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
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        value="{{  (isset($circuito->nombre) ? $circuito->nombre : ''  ) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Visible</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="visible" id="visible"
                                                value="{{  (isset($circuito->visible) ? $circuito->visible : '0'  ) }}"
                                                {{ (isset($circuito->visible) && ($circuito->visible)) ? 'checked="checked"' : '' }}>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary btn-round">
                            {{  (isset($circuito->nombre) ? 'Modificar Circuito': 'Nuevo Circuito'  ) }}</button>
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