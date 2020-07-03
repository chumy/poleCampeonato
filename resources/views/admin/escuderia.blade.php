@extends('admin/layout')

@section('title', 'Escuderias')

@section('content')

<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Escuderias</h4>
                <p class="card-category"> Gestión de todas la escuderias disponibles</p>
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
                            @foreach ($escuderias as $esc)
                            <tr>
                                <td>
                                    {{$esc->id}}
                                </td>
                                <td>
                                    {{$esc->nombre}}
                                </td>

                                <td>
                                   
                                        <form action="{{ action('EscuderiaController@destroy', $esc->id)}}"
                                            method="post">
                                            <a rel="tooltip" title="Edit Task" class="btn btn-primary btn-link"
                                                href="{{ action('EscuderiaController@edit', $esc->id) }}">
                                                <i class="material-icons">edit</i>
                                            </a>

                                            

                                            <a rel="tooltip" title="{{ ($esc->visible) ? 'Visible' : 'No visible' }}"
                                            class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">{{ ($esc->visible) ? 'visibility' : 'visibility_off' }}</i>
                                            </a>

                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" rel="tooltip" title="Remove"
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
                <h4 class="card-title">Nueva Escuderia</h4>
                <p class="card-category">Rellena informacion de una nueva escuderia</p>
            </div>

            <div class="card-body">
                @if(isset($escuderia))
                <form method="POST" action="{{ route('escuderias.update',$escuderia->id) }}" role="form" enctype="multipart/form-data">

                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form method="POST" action="{{ route('escuderias.store') }}" role="form" enctype="multipart/form-data">
                        @endif

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="text" class="form-control" name="nombre"
                                        value="{{  (isset($escuderia->nombre) ? $escuderia->nombre : ''  ) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Visible</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="visible" id="visible"
                                                value="{{  (isset($escuderia->visible) ? $escuderia->visible : '0'  ) }}"
                                                {{ (isset($escuderia->visible) && ($escuderia->visible)) ? 'checked="checked"' : '' }}>

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
                                    <label class="bmd-label-floating"> Descripcion</label>
                                    <textarea class="form-control" rows="5" name="descripcion">{{ (isset($escuderia->descripcion) )  ? $escuderia->descripcion : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                           

                         <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-raised">
                            <img src="{{(isset($escuderia->imagen) ) ? $escuderia->imagen : asset('images/person.png')  }}" height="200px">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                            <div>
                                <span class="btn btn-raised btn-round btn-default btn-file">
                                    <input type="file" name="imagenfile" />
                                </span>
                                <!--a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                    <i class="fa fa-times"></i> Remove</a-->
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-primary btn-round">
                            {{  (isset($escuderia->nombre) ? 'Modificar Escuderia': 'Nueva Escuderia'  ) }}</button>
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