@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Carreras del Campeonato 1</h4>
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
                            <th>Puntuacion
                            </th>
                            <th>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    Carrera 1
                                </td>
                                <td>Puntuacion 1 - 25-18-15-10-9 </td>
                                <td>

                                    <button type="button" rel="tooltip" title="Edit Task"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_upward</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Carreras"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_downward</i>
                                    </button>

                                    <button type="button" rel="tooltip" title="Remove"
                                        class="btn btn-danger btn-link btn-sm">
                                        <i class="material-icons">close</i>
                                    </button>


                                </td>

                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Carrera 2
                                </td>
                                <td>Puntuacion 1 - 25-18-15-10-9 </td>
                                <td>
                                    <button type="button" rel="tooltip" title="Edit Task"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_upward</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Carreras"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_downward</i>
                                    </button>

                                    <button type="button" rel="tooltip" title="Remove"
                                        class="btn btn-danger btn-link btn-sm">
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Agregar Carrera al Campeonato 1</h4>
                <p class="card-category">Añadir carreras al campeonato</p>
            </div>
            <div class="card-body">
                <form>


                    <div class="row">
                        <div class="col-md-5">

                            <div class="form-group">
                                <label for="exampleSelect2" class="bmd-label-floating">Carrera</label>
                                <select class="form-control" id="exampleSelect2">
                                    <option>Dakota Rice</option>
                                    <option>Minnesota Spring</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleSelect2" class="bmd-label-floating">Modelo de Puntuacion</label>
                                <select class="form-control" id="exampleSelect2">
                                    <option>Puntuacion 1 - 25-18-15-10-8</option>
                                    <option>Puntuacion 2 - 5-3-2-1</option>
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

</div>




@endsection