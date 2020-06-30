@extends('admin/layout')

@section('title', 'Participantes')

@section('content')

<div class="row">

  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Listado de Participantes</h4>
        <p class="card-category"> Gestión de todos los participantes disponibles</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Nombre</th>
              <th>Apodo</th>
              <th></th>
            </thead>
            <tbody>
            @foreach ($participantes as $par)
            <tr>
              <td>{{$par->id}}</td>
              <td>{{$par->nombre}}</td>
              <td>{{$par->apodo}} </td>
              <td>
                <div id="row">
                  <a rel="tooltip" title="Edit Task" class="btn btn-primary btn-link"
                  href="{{ action('ParticipanteController@edit', $par->id) }}">
                    <i class="material-icons">edit</i>
                  </a>
                  <a rel="tooltip" title="{{ ($par->visible) ? 'Visible' : 'No visible' }}"
                  class="btn btn-primary btn-link btn-sm">
                    <i class="material-icons">{{ ($par->visible) ? 'visibility' : 'visibility_off' }}</i>
                  </a>
                  <form action="{{ action('ParticipanteController@destroy', $par->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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

  <div class="col-md-6">

    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Nuevo Participante</h4>
        <p class="card-category">Rellena informacion de un participante</p>
      </div>

      <div class="card-body">
        @if(isset($participante))
          <form method="POST" action="{{ route('participantes.update',$participante->id) }}" role="form">

            <input name="_method" type="hidden" value="PATCH">
        @else
          <form method="POST" action="{{ route('participantes.store') }}" role="form">
        @endif
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Nombre</label>
                  <input type="text" class="form-control" name="nombre"
                    value="{{  (isset($participante->nombre) ? $participante->nombre : ''  ) }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Apodo</label>
                  <input type="text" class="form-control" name="apodo"
                    value="{{  (isset($participante->apodo) ? $participante->apodo : ''  ) }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Visible</label>
                  <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="visible" id="visible"
                        value="{{  (isset($participante->visible) ? $participante->visible : '0'  ) }}"
                        {{ (isset($participante->visible) && ($participante->visible)) ? 'checked="checked"' : '' }}>

                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>


            </div>  

            <button type="submit" class="btn btn-primary btn-round">
            {{  (isset($participante) ? 'Modificar Participante': 'Nuevo Participante'  ) }}</button>
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

@endsection