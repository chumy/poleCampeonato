@extends('admin/layout')

@section('title', 'Campeonatos')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Listado de Campeonatos</h4>
                <p class="card-category"> Gestión de todos los campeonatos disponibles</p>
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

                            @foreach ($campeonatos as $campeonato)
                            <tr>
                                <td>
                                    {{ $campeonato->id}}
                                </td>
                                <td>
                                    {{ $campeonato->nombre}}
                                </td>

                                <td>

                                    <button type="button" rel="tooltip" title="Edit Task"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Carreras"
                                        class="btn btn-primary btn-link btn-sm"
                                        onclick="window.location.href='/admin/campeonato/1/carreras'">
                                        <i class="material-icons">location_ons</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Participantes"
                                        class="btn btn-primary btn-link btn-sm"
                                        onclick="window.location.href='/admin/campeonato/1/participantes'">
                                        <i class="material-icons">person</i>
                                    </button>

                                    <button type="button" rel="tooltip" title="Resultados"
                                        class="btn btn-primary btn-link btn-sm"
                                        onclick="window.location.href='/admin/resultados'">
                                        <i class="material-icons">list_alt</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Cambiar visibilidad"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Eliminar"
                                        class="btn btn-danger btn-link btn-sm">
                                        <i class="material-icons">close</i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Nuevo Campeonato</h4>
                <p class="card-category">Completa los campos para un nuevo campeonato</p>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleSelect1" class="bmd-label-floating">Tipo</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option value="1">Individual</option>
                                    <option value="2">Escuderias</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de coches</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de carreras</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Numero de vueltas</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="exampleSelect2" class="bmd-label-floating">Modelo de Puntuacion por
                                    defecto</label>
                                <select class="form-control" id="exampleSelect2">
                                    <option>Puntuacion 1 - 25-18-15-10-8</option>
                                    <option>Puntuacion 2 - 5-3-2-1</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Expansion Pilotos</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Expansion Escuderias</label>
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
                                <label>Descripcion</label>
                                <div class="form-group">
                                    <label class="bmd-label-floating"> Descripcion del Camepeonato.</label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="exampleSelect2" class="bmd-label-floating">Puntuacion por Equipos</label>
                                <select class="form-control" id="exampleSelect2">
                                    <option>Puntuacion 1 - 25-18-15-10-8</option>
                                    <option>Puntuacion 2 - 5-3-2-1</option>
                                </select>
                            </div>

                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary pull-right">Nuevo Campeonato</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>






@endsection