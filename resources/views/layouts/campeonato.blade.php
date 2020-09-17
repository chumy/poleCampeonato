<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pole Position</title>

  <!-- Bootstrap core CSS -->
  <!--link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"-->
  <link href ="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />


  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="{{ asset('css/estilo2.css') }}" rel="stylesheet">

</head>
    <body>

    <div class="gap-up"></div>

  <!-- Navigation -->
 
  <nav class="navbar  static-top grad" style="z-index: 1000;">
    <div class="d-none d-sm-block">
        <a class="navbar-brand" href="{{ route('index') }}">Pole Position</a>     
 
    </div>

    <div class="text-right">
            <a class="navbar-brand" href="{{route ('campeonato.show',['slug' => $campeonato->slug]) }}">Volver</a>  
    </div> 

  </nav>
  
<!-- Begin page content -->
<div class="gap-up"></div>


                @yield('content')

                

 
    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
          
      </body>
  </html>
  