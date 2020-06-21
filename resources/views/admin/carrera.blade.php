@extends('admin/layout')

@section('title', 'Carreras')

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
                            @foreach ($carreras as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->nombre }}</td>

                                <td>
                                    <form action="{{ action('CarreraController@destroy', $car->id)}}" method="post">
                                        {{csrf_field()}}

                                        <a rel="tooltip" href="{{ action('CarreraController@edit', $car->id) }}"
                                            title="Editar Carrera" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </a>

                                        <a rel="tooltip" title="{{ ($car->visible) ? 'Visible' : 'No visible' }}"
                                            class="btn btn-primary btn-link btn-sm">
                                            <i
                                                class="material-icons">{{ ($car->visible) ? 'visibility' : 'visibility_off' }}</i>
                                        </a>
                                        <form action="{{ action('CarreraController@destroy', $car->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" rel="tooltip" title="Eliminar Carrera"
                                                class="btn btn-danger btn-link btn-sm">
                                                <i class="material-icons">close</i>
                                            </button>


                                </td>
                                </form>
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
                <h4 class="card-title">Nueva Carrera</h4>
                <p class="card-category">Rellena informacion de una nueva carrera</p>
            </div>

            <div class="card-body">
                @if(isset($carrera))
                <form method="POST" action="{{ route('carreras.update',$carrera->id) }}" role="form">

                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form method="POST" action="{{ route('carreras.store') }}" role="form">
                        @endif

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        value="{{  (isset($carrera->nombre) ? $carrera->nombre : ''  ) }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Visible</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="visible" id="visible"
                                                value="{{  (isset($carrera->visible) ? $carrera->visible : '0'  ) }}"
                                                {{ (isset($carrera->visible) && ($carrera->visible)) ? 'checked="checked"' : '' }}>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-primary btn-round">
                            {{  (isset($carrera->nombre) ? 'Modificar Carrera': 'Nueva Carrera'  ) }}</button>
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