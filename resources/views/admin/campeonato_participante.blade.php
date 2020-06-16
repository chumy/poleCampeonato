@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')


<div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Campeonato 1</h4>
                  <p class="card-category">Añadir Participantes al campeonato</p>
                </div>
                <div class="card-body">
                  <form>
                   
                
                    <div class="row">
                      

                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Participante</label>
                          <select class="form-control" id="exampleSelect2">
                            <option>Apodo 1</option>
                            <option>Apodo 2</option>
                          </select>
                        </div>

                      </div>

                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Piloto</label>
                          <select class="form-control" id="exampleSelect2">
                            <option>Piloto 1</option>
                            <option>Piloto 2</option>
                          </select>
                        </div>

                      </div>

                      <div class="col-md-3">
                        
                        <div class="form-group">
                          <label for="exampleSelect2" class="bmd-label-floating">Escuderia</label>
                          <select class="form-control" id="exampleSelect2">
                            <option>Escuderia 1</option>
                            <option>Escuderia 2</option>
                          </select>
                        </div>

                      </div>
                      

                    </div>
                      
                    
                    <button type="submit" class="btn btn-primary pull-right">Añadir Participante</button>
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
                  <h4 class="card-title ">Listado de Participantes</h4>
                  <p class="card-category"> Gestión de todos los participantes disponibles para el campeonato</p>
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
                        <th>Piloto</th>
                        <th>Escuderia</th>
                        <th>
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Apodo 1
                          </td>

                          <td>Piloto 1</td>
                          <td>Escuderia 1</td>
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
                            Apodo 2
                          </td>

                          <td>Piloto 2</td>
                          <td>Escuderia 2</td>
                          
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