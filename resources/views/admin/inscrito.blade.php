@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Listado de Participantes</h4>
                  <p class="card-category"> Gestión de todos los participantes disponibles para el campeonato</p>
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
                        @if ($campeonato->pilotos)
                        <th>Piloto</th>
                        @endif
                        @if ($campeonato->escuderias)
                        <th>Escuderia</th>
                        @endif
                        <th>
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($campeonato->inscritos as $ins)
                        <tr>
                          <td>
                            {{$loop->iteration}}
                          </td>
                          <td>
                            {{$ins->participante->apodo}}
                          </td>
                          @if ($campeonato->pilotos)
                          <td>{{ ($ins->piloto) ? $ins->piloto->nombre : ''}}</td>
                          
                          @endif

                          @if ($campeonato->escuderias)
                          <td>{{ ($ins->escuderia) ? $ins->escuderia->nombre : ''}}</td>
                          
                          @endif
<td>
    <div class="row">
   <a rel="tooltip" href="{{ action('InscritoController@edit', $ins->id) }}" 
                                        title="Editar Inscripcion"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                </a>

  <form action="{{ action('InscritoController@destroy', $ins->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" rel="tooltip" title="Eliminar Inscripción"
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

            </diV>


<div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">{{$campeonato->nombre}}</h4>
                  <p class="card-category">Añadir Participantes al campeonato</p>
                </div>
                <div class="card-body">
                  @if(isset($inscrito))
                    <form method="POST" action="{{ route('inscritos.update',['inscrito' => $inscrito->id]) }}" role="form">
                    <input name="_method" type="hidden" value="PATCH">
                @else
                    <form method="POST" action="{{ route('inscritos.store') }}" role="form">
                @endif
                        {{ csrf_field() }}
                      <input type="hidden" name='campeonato_id' value="{{$campeonato->id}}">
                   
                
                    <div class="row">
                      

                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label for="participante_id" class="bmd-label-floating">Participante</label>
                          <select class="form-control" id="participante_id" name="participante_id">
                            @if ( isset($inscrito) )
                              <option value="{{$inscrito->participante->id}}" selected>{{$inscrito->participante->apodo}}</option>
                            @endif
                             @foreach ($participantes as $par)             
                            <option value="{{$par->id}}">{{$par->apodo}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>

                      @if ($campeonato->pilotos)
                     
                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label for="piloto_id" class="bmd-label-floating">Piloto</label>
                          <select class="form-control" id="piloto_id" name="piloto_id">
                             @foreach ($pilotos as $pil)
                            <option value="{{$pil->id}}"
                              @if ( (isset($inscrito)) && ($inscrito->piloto->id == $pil->id) )
                               selected
                               @endif
                              >{{$pil->nombre}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>
                      @endif

                      @if ($campeonato->escuderias)
                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label for="escuderia_id" class="bmd-label-floating">Escuderia</label>
                          <select class="form-control" id="escuderia_id" name="escuderia_id">
                            @foreach ($escuderias as $esc)
                            <option value="{{$esc->id}}"
                              @if ( (isset($inscrito)) && ($inscrito->escuderia->id == $esc->id) )
                               selected
                               @endif
                              >{{$esc->nombre}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>
                      @endif

                    </div>
                      
                    

                    <button type="submit" class="btn btn-primary pull-right">{{  (isset($inscrito) ? 'Modificar Participante': 'Añadir Participante'  ) }}</button>
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
</diV>
          
@endsection