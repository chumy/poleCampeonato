
@extends('layout')

@section('title', 'Portada')

@section('content')

  <!-- Masthead -->
  <header class="masthead text-white text-center clasificacion">
    <div class="overlay clasificacion"></div>
    <div class="container"></div>
  </header>

  <section class="campeonatos lista bg-light">

  <div class="container">
      <div class="row">
    
      <div class="col-lg-4">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

    
        <span class="navbar-brand mb-0 h1">Campeonato </span>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Campeonato 1
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                  <a class="dropdown-item" href="#">Campeonato 2</a>
                  <a class="dropdown-item" href="#">Campeonato 3</a>
                </div>
              </li>
            </ul>
          </div>
          
          
      </div>
</div>
</div>




</section>


  <section class="secciones-portada bg-light text-center" >
    <div class="container">
      <div class="row">
        <div class="col-lg-10">

       Individual sin expansion pilotos

        <table class="table table-hover table-light">
          <thead>
            <tr class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Puntuacion</th>
              <th></th>
            </tr>
          </thead>
          <tbody >
            
            <tr>
              <th scope="row">1</th>
              <td>Apodo 1</td>
              <td>20</td>
              <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Coche 2</td>
              <td>18</td>
              <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
            </tr>
           
           
           
          </tbody>
        </table>
       

        </div>


      
      </div>
    </div>
  </section>

  <section class="secciones-portada bg-light text-center" >
    <div class="container">
      <div class="row">
        <div class="col-lg-10">

       Individual con expansion pilotos

        <table class="table table-hover table-light">
          <thead>
            <tr class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Piloto</th>
              <th scope="col">Puntuacion</th>
              <th></th>
            </tr>
          </thead>
          <tbody >
            
            <tr>
              <th scope="row">1</th>
              <td>Apodo 1</td>
              <td>Piloto 1</td>
              <td>20</td>
              <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Apodo 2</td>
              <td>Piloto 2</td>
              <td>18</td>
              <td><a href="/campeonato/piloto"><i class="material-icons">timer</i></a></td>
            </tr>
           
           
           
          </tbody>
        </table>
       

        </div>


      
      </div>
    </div>
  </section>
    
 
  <section class="secciones-portada bg-light text-center" >
    <div class="container">
      <div class="row">
        <div class="col-lg-10">

       
      Campeonato con Escuderias 

        <table class="table table-hover table-light">
          <thead>
            <tr class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Escuderia</th>
              <th scope="col">Nombre</th>
              <th scope="col">Puntuacion</th>
              <th></th>
            </tr>
          </thead>
          <tbody >
            
            <tr>
              <th scope="row">1</th>
              <td>Escuderia 1</td>
              <td>Apodo 1 / Apodo 2</td>
              <td>20</td>
              <td><a href="/campeonato/escuderia"><i class="material-icons">timer</i></a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Escuderia 2</td>
             <td> Apodo 3</td>
              <td>18</td>
              <td><a href="/campeonato/escuderia"><i class="material-icons">timer</i></a></td>
            </tr>
           
           
           
          </tbody>
        </table>
       

        </div>


      
      </div>
    </div>
  </section>

  
  @endsection
