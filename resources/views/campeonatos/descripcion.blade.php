@extends('layout')



@section('content')


<section class=" text-center">

    <div class="container ">
        <div class="row">
            <div class="col-md-12 blog-main bg-light">

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
                        <dd
                        @if ($campeonato->puntuaciones->toText())
                        class="col-sm-3"
                        @else
                        class="col-sm-9"
                        @endif  
                        >
                           {{ $campeonato->puntuaciones->toText() }}

                        </dd>
                         @if ($campeonato->getPuntuacionesEscuderias)
                         <dt class="col-sm-3">Puntuación de Escuderías</dt>
                        <dd class="col-sm-3">{{$campeonato->getPuntuacionesEscuderias->toText()}}
                         @endif
                        <dt class="col-sm-9"></dt>
                        <dd class="col-sm-3"></dd>
                        @foreach ($campeonato->getPuntuacionesCarreras as $carreasEspeciales )
                        <dt class="col-sm-3">Puntuación especial Carrera {{$carreasEspeciales->orden}}</dt>
                        <dd class="col-sm-9">{{$carreasEspeciales->puntos->toText() }}</dd>
                        @endforeach

                    </dl>
                    <hr>

                </div><!-- /.blog-post -->
            </div>
        </div> <!-- row -->
    </div>
    
<div class="gap-up" ></div>
<div class="container">
 
    <div class="row justify-content-md-center " >

      <div class="col col-sm-3 "> <!-- Campeonato-->
        <a href="{{route ('campeonato.clasificacion',['slug' => $campeonato->slug]) }}" class="secciones-enlace">
            <div class="card" >
                <img class="card-img-top" src="{{asset ('images/campeonato1_960.jpg')}}" alt="Card image cap">
                <div class="card-body  bg-light">

                    <h3>Clasificacion</h3>
            

                </div>
            </div>
        </a>
      </div>

      <div class="col col-sm-3 "> <!-- Calendario-->
        <a href="{{route ('campeonato.calendario',['slug' => $campeonato->slug]) }}" class="secciones-enlace">
            <div class="card" >
                <img class="card-img-top" src="{{asset ('images/calendario960.jpg')}}"" alt="Card image cap">
                <div class="card-body  bg-light">

                    <h3>Calendario</h3>
            

                </div>
            </div>
        </a>
      </div>

      <!-- Pilotos -->
      <div class="col-sm-3"> 
        <a href="{{route ('campeonato.pilotos',['slug' => $campeonato->slug]) }}" class="secciones-enlace">
            <div class="card" >
                <img class="card-img-top" src="{{asset ('images/pilotos960smooth.jpg')}}"" alt="Card image cap">
                <div class="card-body  bg-light">

                    <h3>Pilotos</h3>
                    

                </div>
            </div>
        </a>
      </div>

    <!-- Escuderias-->  
     @if ($campeonato->escuderias || ($campeonato->tipo== 2))
        <div class="col col-sm-3">
           
            <a href="{{route ('campeonato.escuderias',['slug' => $campeonato->slug]) }}" class="secciones-enlace">
                <div class="card" >
                    <img class="card-img-top" src="{{asset ('images/escuderias960smooth.jpg')}}" alt="Card image cap">
                    <div class="card-body  bg-light">

                        <h3>Escuderias</h3>
                      

                    </div>
                </div>
            </a>
        </div>

      @endif
    </div>


</section>





@endsection