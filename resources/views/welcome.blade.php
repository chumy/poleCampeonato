@extends('layout')

@section('title', 'Portada')

@section('content')

<div class="container" style="height: 80%">
 
    <div class="row justify-content-md-center " style="height: 100%">
      <div class="col col-sm-4" style="height: 30%"> <!-- Campeonato-->

        <div class="card " style=" background: transparent">
            <div class="card-body card-f1-title">
                <h5 class="card-title">Campeonatos</h5>
                <!--img class="card-img-top" src="./Pole Position_files/campeonato2.jpg" alt="Card image"-->
            </div>
            <ul class="list-group list-group-flush list-f1">
                @foreach ($campeonatos as $camp)
                <li class="list-group-item">
                    <a class="list-f1" href="{{route ('campeonato.show', ['campeonato'=>$camp->slug]) }}">{{$camp->nombre}}</a></li>
                @endforeach
              </ul>
        </div>
        
      </div>
      <div class="col-sm-3"> <!-- Separacion -->

      </div>
 <!-- Carreras-->  
     
<div class="col col-sm-5">
    <!-- Gap -->
    <div class="row" style="height: 60%;" ></div>
    <div class="card"  style="  background: transparent">
      <div class="card-body  card-f1-title">
          <h5 class="card-title">Proximas Carreras</h5>
      </div>
      <ul class="list-group list-group-flush list-f1" >
          <li class="list-group-item ">2020.07.15 - Campeonato 1 - Bahrein</li>
         <li class="list-group-item ">2020.07.15 - Campeonato 1 - Bahrein</li>
         <li class="list-group-item ">2020.07.15 - Campeonato 1 - Bahrein</li>
        </ul>
  </div>
</div>

      
    </div>
   
    
</div>
</section>


@endsection