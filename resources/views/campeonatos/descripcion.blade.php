<section class="secciones-portada bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class=" pb-3 mb-4 font-italic border-bottom ">
                    {{ $campeonato->nombre}}
                </h3>

                <div class=" blog-post text-left">

                    <p>{{ $campeonato->descripcion}}</p>
                    <hr>

                    <h5>Formato</h5>
                    <dl class="row">
                        <dt class="col-sm-3">Número de coches</dt>
                        <dd class="col-sm-3">{{ $campeonato->num_coches}}</dd>
                        <dt class="col-sm-3">Número de carreras</dt>
                        <dd class="col-sm-3">{{ $campeonato->num_carreras}}</dd>
                        <dt class="col-sm-3">Vueltas por carreras</dt>
                        <dd class="col-sm-3">{{ $campeonato->num_vueltas}}</dd>
                        <dt class="col-sm-3">Penalización por abandono</dt>
                        <dd class="col-sm-3">50%</dd>

                        <dt class="col-sm-3">Pilotos</dt>
                        <dd class="col-sm-3">{{ ($campeonato->pilotos) ? 'Habilitados' : 'Deshabilitados' }}</dd>
                        <dt class="col-sm-3">Escuderias</dt>
                        <dd class="col-sm-3">{{ ($campeonato->escuderias) ? 'Habilitadas' : 'Deshabilitadas' }}</dd>

                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>

                        <dt class="col-sm-3">Puntuación</dt>
                        <dd class="col-sm-9">
                           {{ $campeonato->puntuaciones->toText() }}

                        </dd>
                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>
                        @foreach ($campeonato->getPuntuacionesCarreras as $carreasEspeciales )
                        <dt class="col-sm-3">Puntuación especial Carrera {{$carreasEspeciales->orden}}</dt>
                        <dd class="col-sm-9">
{{$carreasEspeciales->puntos->toText() }}
                        </dd>
                        @endforeach

                    </dl>
                    <hr>

                </div><!-- /.blog-post -->
            </div>
        </div>


</section>