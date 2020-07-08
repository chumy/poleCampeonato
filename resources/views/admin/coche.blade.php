@extends('admin/layout')

@section('title', 'Coches')

@section('content')


<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Coches</h4>
                <p class="card-category"> Gestión de todos los coches disponibles</p>
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
                            @foreach ($coches as $car)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $car->nombre }}</td>

                                <td>
                                   <form action="{{ action('CocheController@destroy', $car->id)}}" method="post">
                                    <a rel="tooltip" href="{{ action('CocheController@edit', $car->id) }}"
                                        title="Editar Coche" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>

                                   
                                    
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
                <h4 class="card-title">Nuevo Coche</h4>
                <p class="card-category">Rellena informacion de un nuevo coche</p>
            </div>

            <div class="card-body">
                @if(isset($coche))
                <form method="POST" action="{{ route('coche.update',$coche->id) }}" role="form" enctype="multipart/form-data">

                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form method="POST" action="{{ route('coche.store') }}" role="form" enctype="multipart/form-data">
                        @endif

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        value="{{  (isset($coche->nombre) ? $coche->nombre : ''  ) }}">
                                </div>
                            </div>

                           

                        </div>
<div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-raised">
                            <img src="{{(isset($coche->imagen) ) ? $coche->imagen : asset('images/person.png')  }}" height="200px">
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
                            {{  (isset($coche->nombre) ? 'Modificar Coche': 'Nuevo Coche'  ) }}</button>
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