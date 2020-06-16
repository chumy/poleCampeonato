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
                            Participante 1
                          </td>
                          <td>
                            Apodo 1
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
                            Participante 2
                          </td>
                          <td>
                            Apodo 2
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
                  <h4 class="card-title">Nuevo Participante</h4>
                  <p class="card-category">Rellena informacion de un participante</p>
                </div>
               
                <div class="card-body">
                  
                  
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      
                  
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apodo</label>
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
                 
                  <a href="javascript:;" class="btn btn-primary btn-round">Nuevo Participante</a>
                </div>
              </div>
            </div>
          </div>

          @endsection