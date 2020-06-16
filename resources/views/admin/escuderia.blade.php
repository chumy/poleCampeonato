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
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Escuderia 1
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
                            Escuderia 2
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
                  <h4 class="card-title">Nueva Escuderia</h4>
                  <p class="card-category">Rellena informacion de una nueva escuderia</p>
                </div>
               
                <div class="card-body">
                  
                  <div class="row">
                  <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
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
                  
                 
                  <a href="javascript:;" class="btn btn-primary btn-round">Nueva Escuderia</a>
                </div>
              </div>
            </div>
          </div>

          @endsection