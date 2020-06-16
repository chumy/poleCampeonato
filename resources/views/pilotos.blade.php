
@extends('layout')

@section('title', 'Portada')

@section('content')

  <!-- Masthead -->
  <header class="masthead text-white text-center pilotos">
    <div class="overlay pilotos"></div>
    <div class="container"></div>
  </header>

  


  <section class="secciones-portada bg-light text-center" >
    <div class="container">
      <div class="row">
        <div class="col-lg-10">


        <table class="table table-hover table-light">
          <thead>
            <tr class="thead-dark">
              <th scope="col">#</th>
              <th scope="col">Piloto</th>
              <th scope="col">Puntuacion</th>
             
            </tr>
          </thead>
          <tbody >
            
            <tr>
              <th scope="row">1</th>
              <td>Apodo 1</td>
              <td>20</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Apodo 2</td>
              <td>15</td>
            </tr>
           
           
           
          </tbody>
        </table>
     

        </div>
        
      
      </div>
      
    </div>
  </section>



  
  @endsection
