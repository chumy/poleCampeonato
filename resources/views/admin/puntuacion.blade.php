@extends('admin/layout')

@section('title', 'Puntuacion')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Puntuaciones</h4>
                <p class="card-category">Añadir puntuaciones para los campeonatos</p>
            </div>
            <div class="card-body">
                 @if(isset($punto))
                <form method="POST" action="{{ route('puntos.update',$punto->id) }}" role="form">

                    <input name="_method" type="hidden" value="PATCH">
                    @else
                    <form method="POST" action="{{ route('puntos.store') }}" role="form">
                        @endif

                        {{ csrf_field() }}


                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="exampleSelect2" class="bmd-label-floating">Nombre</label>
                                <input type="text" class="form-control" name="nombre"
                                value="{{  (isset($punto->nombre) ? $punto->nombre : ''  ) }}">
                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="penalizacion" class="bmd-label-floating">Penalizacion Abandono</label>
                                <select class="form-control" id="penalizacion" name="penalizacion">
                                    <option value="1"
                                    @if ((isset($punto)) && ($punto->penalizacion == 1) )
                                    selected
                                    @endif
                                    >Ninguna</option>
                                    <option value="0.5"
                                    @if ((isset($punto)) && ($punto->penalizacion == 0.5) )
                                    selected
                                    @endif
                                    >-50%</option>
                                    <option value="0"
                                    @if ((isset($punto)) && ($punto->penalizacion == 0) )
                                    selected
                                    @endif
                                    >-100%</option>
                                </select>
                            </div>
                        </div>

                    </div>
  
                    <button type="submit" class="btn btn-primary pull-right">
                        {{  (isset($punto) ? 'Modificar Puntuacion': 'Nueva Puntuacion'  ) }}</button>
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
 
   <div class="row">
                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="inputPunt1" class="bmd-label-floating">Primera Posicion</label>
                                <input type="text" class="form-control" name="num1"
                                value="{{  ( isset($punto)  && ( $punto->getPunto(1)->puntos > 0 )  ) ? $punto->getPunto(1)->puntos  : '0' }}">
                            </div>

                        </div>
                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="inputPunt2" class="bmd-label-floating">Segunda Posicion</label>
                                <input type="text" class="form-control" name="num2"
                                value="{{  ( isset($punto)  && ( $punto->getPunto(2)->puntos > 0 )  ) ? $punto->getPunto(2)->puntos  : '0' }}">
                            </div>
                        </div>

                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="inputPunt3" class="bmd-label-floating">Tercera Posicion</label>
                                <input type="text" class="form-control" name="num3"
                                value="{{  ( isset($punto)  && ( $punto->getPunto(3)->puntos > 0 )  ) ? $punto->getPunto(3)->puntos  : '0' }}">
                            </div>

                        </div>
                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="inputPunt4" class="bmd-label-floating">Cuarta Posicion</label>
                                <input type="text" class="form-control" name="num4"
                                value="{{  ( isset($punto)  && ( $punto->getPunto(4)->puntos > 0 )  ) ? $punto->getPunto(4)->puntos  : '0' }}">
                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="inputPunt5" class="bmd-label-floating">Quinta Posicion</label>
                                <input type="text" class="form-control"  name="num5"
                                value="{{  ( isset($punto)  && ( $punto->getPunto(5)->puntos > 0 )  ) ? $punto->getPunto(5)->puntos  : '0' }}">
                            </div>
                        </div>

                        <div class="col-md-2">

                            <div class="form-group">
                                <label for="inputPunt6" class="bmd-label-floating">Sexta Posicion</label>
                                <input type="text" class="form-control" name="num6"
                                value="{{  ( isset($punto)  && ( $punto->getPunto(6)->puntos > 0 )  ) ? $punto->getPunto(6)->puntos  : '0' }}">
                            </div>

                        </div>
                        

                    </div>


                </form>
            </div>
        </div>
    </div>

</diV>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Puntuaciones</h4>
                <p class="card-category"> Gestión de las puntuaciones disponibles para el campeonato</p>
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
                                Abandono
                            </th>
                            <th>Puntuacion</th>

                            <th>
                            </th>
                        </thead>
                        <tbody>
                            @foreach($puntos as $punt)
                            <tr>
                                <td>
                                    {{$punt->id}}
                                </td>
                                <td>
                                    {{$punt->nombre}}
                                </td>
                                <td>
                                     @if ($punt->penalizacion == 1) 
                                     Ninguna
                                     @else 
                                     {{($punt->penalizacion * 100) -100}} %
                                     @endif 
                                </td>
                                <td>{{$punt->toText()}}</td>

                                <td>

                                    <form action="{{ action('PuntoController@destroy', $punt->id)}}" method="post">
                                      <a rel="tooltip" href="{{ action('PuntoController@edit', $punt->id) }}"
                                        title="Editar Puntuación" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>

                                     <a rel="tooltip" title="{{ ($punt->visible) ? 'Visible' : 'No visible' }}"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i
                                            class="material-icons">{{ ($punt->visible) ? 'visibility' : 'visibility_off' }}</i>
                                    </a>

                                       {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <!--button type="submit" rel="tooltip" title="Eliminar Puntuación"
                                            class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#exampleModal">
                                            <i class="material-icons">close</i>
                                        </button-->
                                        <a rel="tooltip" href="javascript:delWarning({{$punt->id}})"
                                        title="Editar Puntuación" class="btn btn-danger btn-link btn-sm">
                                        <i class="material-icons">close</i>
                                    </a>
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
</div>

</diV>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Puntuación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Eliminar puntuaciones puede repecutir en la puntuacion de los campeonatos que tengan relacionada esta puntuación. Asegurese de que esta puntuación no se está utilizando en ningun campeonato/carrera antes de eliminarla.
      </div>
      <form id="modalFormDelete" method="post">
        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submitn" class="btn btn-primary">Eliminar puntuacion</button>

      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
function delWarning(id){

    $('#exampleModalLabel').html("Eliminar Puntuación");
    $('#exampleModal').modal('toggle');
    $('#modalFormDelete').attr('action','/admin/puntos/'+id);
    
};

</script>


@endsection