@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')


<div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Campeonato 1</h4>
                  <p class="card-category">Añadir carreras al campeonato</p>
                </div>
                <div class="card-body">
                  <form>
                   
                
                    <div class="row">
                      <div class="col-md-8">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Carrera</label>
                          <select class="form-control" id="exampleSelect2">
                            <option>Dakota Rice</option>
                            <option>Minnesota Spring</option>
                          </select>
                        </div>

                      </div>
                    </div>
                      
                    
                    <button type="submit" class="btn btn-primary pull-right">Añadir Carrera</button>
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
                  <h4 class="card-title ">Listado de Carreras</h4>
                  <p class="card-category"> Gestión de todas la carreras disponibles para el campeonato</p>
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
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Dakota Rice
                          </td>
                  
                          <td>
                          
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">arrow_upward</i>
                              </button>
                              <button type="button" rel="tooltip" title="Añadir Carreras" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">arrow_downward</i>
                              </button>
                              
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
                            Minnesota Spring
                          </td>
                          
                          <td>
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">arrow_upward</i>
                              </button>
                              <button type="button" rel="tooltip" title="Añadir Carreras" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">arrow_downward</i>
                              </button>
                              
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