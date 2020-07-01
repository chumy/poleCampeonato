@extends('admin/layout')

@section('title', 'Pilotos')

@section('content')
 
 

          <div class="row">
              

            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Listado de Pilotos</h4>
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
                        @foreach ($pilotos as $pil)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pil->nombre }}</td>

                                <td>
                                  <form action="{{ action('PilotoController@destroy', $pil->id)}}" method="post">
                                    <a rel="tooltip" href="{{ action('PilotoController@edit', $pil->id) }}"
                                        title="Editar Circuito" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>

                                    <a rel="tooltip" title="{{ ($pil->visible) ? 'Visible' : 'No visible' }}"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i
                                            class="material-icons">{{ ($pil->visible) ? 'visibility' : 'visibility_off' }}</i>
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
                         
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>

            </div>

            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Nuevo Piloto</h4>
                  <p class="card-category">Rellena informacion de un nuevo piloto</p>
                </div>
                <div class="card-body">
                   @if(isset($piloto))
                <form method="POST" action="{{ route('pilotos.update',$piloto->id) }}" role="form">

                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form method="POST" action="{{ route('pilotos.store') }}" role="form">
                        @endif

                        {{ csrf_field() }}
                    <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        value="{{  (isset($piloto->nombre) ? $piloto->nombre : ''  ) }}">
                                </div>
                            </div>

                           

                        
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Visible</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="visible" id="visible"
                                                value="{{  (isset($piloto->visible) ? $piloto->visible : '0'  ) }}"
                                                {{ (isset($piloto->visible) && ($piloto->visible)) ? 'checked="checked"' : '' }}>

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
                          <label>Caracteristicas</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Descripcion de las habilidades especificas del piloto.</label>
                            <textarea class="form-control" rows="5" name="descripcion">{{  (isset($piloto->descripcion) ? $piloto->descripcion : ''  ) }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary btn-round">
                            {{  (isset($piloto) ? 'Modificar Piloto': 'Nuevo Piloto'  ) }}</button>
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