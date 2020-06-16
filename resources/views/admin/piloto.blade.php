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
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Piloto 1
                          </td>
                  
                          <td>
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                              <button type="button" rel="tooltip" title="Change visibity" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">visibility</i>
                              </button>
                          </td>
                          
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Piloto 2
                          </td>
                          
                          <td>
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                              <button type="button" rel="tooltip" title="Change visibity" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">visibility_off</i>
                              </button>
                          </td>
                          
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
                  <form>
                    
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Visible</label>
                          <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
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
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Añadir Piloto</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          
        
 
  @endsection