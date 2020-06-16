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
                  <form>
                   
                
                    <div class="row">
                      <div class="col-md-4">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Nombre</label>
                          <input type="text" class="form-control">
                        </div>

                      </div>
                      

                      <div class="col-md-4">
                        
                      <div class="form-group">
                          <label for="exampleSelect1" class="bmd-label-floating">Penalizacion Abandono</label>
                          <select class="form-control" id="exampleSelect1">
                            <option>Ninguna</option>
                            <option>-50%</option>
                            <option>-100%</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Primera Posicion</label>
                          <input type="text" class="form-control" value="0">
                        </div>

                      </div>

                      <div class="col-md-2">
                        
                      <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Segunda Posicion</label>
                          <input type="text" class="form-control" value="0">
                        </div>
                      </div>

                      <div class="col-md-2">
                        
                      <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Tercera Posicion</label>
                          <input type="text" class="form-control" value="0">
                        </div>

                      </div>
                      <div class="col-md-2">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Cuarta Posicion</label>
                          <input type="text" class="form-control" value="0">
                        </div>

                      </div>

                      <div class="col-md-2">
                        
                      <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Quinta Posicion</label>
                          <input type="text" class="form-control" value="0">
                        </div>
                      </div>

                      <div class="col-md-2">
                        
                      <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Sexta Posicion</label>
                          <input type="text" class="form-control" value="0">
                        </div>

                      </div>

                    </div>
                      
                    
                    <button type="submit" class="btn btn-primary pull-right">Añadir Puntuacion</button>
                    <div class="clearfix"></div>
                    
                 
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
                      <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Puntuacion Estandard
                          </td>
                          <td>
                            Ninguno
                          </td>
                          <td>10-8-6-5-4-3</td>
                          
                          <td>
                          
                          
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                              
                              
                          </td>
                          
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Puntuacion Escuderias
                          </td>
                          <td>
                            50%
                          </td>
                          <td>10-8-6-5-4-3</td>
                          
                          <td>
                          
                          
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                              
                              
                          </td>
                          
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          
                          <td>
                            Puntuacion Extra Escuderias
                          </td>
                          <td>
                            50%
                          </td>
                          <td>15-12-10-8-6-5</td>
                          
                          <td>
                                                      
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                              
                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
            </div>

            </diV>

@endsection