<section class="secciones-portada bg-light text-center">
    <div class="container">
        <div class="row">

            @if ($campeonato->tipo == 2)
            <div class="col-lg-6">
                @else
                <div class="col-lg-10">
                    @endif

                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                @if ($campeonato->pilotos)
                                <th scope="col">Pilotos</th>
                                @endif
                                @if ($campeonato->escuderias)
                                <th scope="col">Escuderias</th>
                                @endif

                                <th scope="col">Puntuacion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($campeonato->getClasificacion() as $clasif)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$clasif['inscrito']->participante->apodo}}</td>
                                @if ($campeonato->pilotos)
                                <td>{{$clasif['inscrito']->piloto->nombre}}</td>
                                @endif
                                @if ($campeonato->escuderias)
                                <td>{{$clasif['inscrito']->escuderia->nombre}}</td>
                                @endif
                                @if ($campeonato->tipo == 2)

                                <td>{{$clasif['puntos']}}
                                    ({{$clasif['puntos_pilotos']}}+{{$clasif['puntos_esc']}}) </td>

                                @else
                                <td>{{$clasif->puntos}}</td>
                                @endif
                                <td><a
                                        href="{{ route('campeonato.piloto', [ 'campeonato' =>$campeonato->id ,'participante' => $clasif['inscrito']->participante->id]) }}"><i
                                            class="material-icons">timer</i></a>
                                </td>
                            </tr>
                            @endforeach



                        </tbody>
                    </table>


                </div>
                @if ($campeonato->tipo == 2)
                <div class="col-lg-4">



                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="thead-dark">
                                <th scope="col">#</th>
                                <th scope="col">Escuderia</th>
                                <th scope="col">Puntuacion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($campeonato->getClasificacionEscuderias() as $clasifEsc)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{ $clasifEsc['escuderia']->nombre }}</td>
                                <td>{{ $clasifEsc['puntos']}} ({{$clasifEsc['puntos_escuderia'] }}) </td>
                                <td><a
                                        href="{{ route('campeonato.escuderia', [ 'campeonato' =>$campeonato->id ,'escuderia' => $clasifEsc['escuderia']->id  ]) }}"><i
                                            class="material-icons">timer</i></a></td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>


                </div>
                @endif


            </div>
        </div>
</section>