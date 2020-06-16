@extends('admin/layout')

@section('title', 'Resultados')

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <div class="btn-group">

                    <div class="dropdown show">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Campeonato 1
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Campeonato 1</a>
                            <a class="dropdown-item" href="#">Campeonato 2</a>
                            <a class="dropdown-item" href="#">Campeonato 3</a>
                        </div>
                    </div>


                    <div class="dropdown show">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Carrera 3
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Carrera 1</a>
                            <a class="dropdown-item" href="#">Carrera 2</a>
                            <a class="dropdown-item" href="#">Carrera 3</a>
                        </div>
                    </div>

                </div>



                <p class="card-category"> Organiza el resultado de la carrera</p>
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
                            <th>Participacion</th>
                            <th>Abandono</th>
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

                                <td>Piloto 1</td>
                                <td>Escuderia 1</td>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>


                                    <button type="button" rel="tooltip" title="Edit Task"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_upward</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Carreras"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_downward</i>
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


                                <td>Piloto 2</td>
                                <td>Escuderia 2</td>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="" checked>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td>

                                    <button type="button" rel="tooltip" title="Edit Task"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_upward</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Añadir Carreras"
                                        class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">arrow_downward</i>
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


@endsection