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
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Pole Position</a>


       

          <div class="text-right  d-none d-lg-block">
            <a class="navbar-brand" href="http://www.doitgames.com">DoIt Games</a>
          </div> 
  

          @if (Route::has('login2'))
                <div class="text-right dropdown d-none d-sm-block">
                    
                    @auth
                        <a class="navbar-brand btn  dropdown-toggle" data-toggle="dropdown">Administrador</a>   
                         <ul class="dropdown-menu dropdown-menu-right mt-2 list-f1">
                             <li class="px-3 py-2">
                                  <a class="navbar-brand" href="/admin">Administración</a>
                             </li>
                            <li class="px-3 py-2">
                                <form class="form" action="{{ url('logout') }}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Desconectar</button>
                                        </div>
                                        <!--div class="form-group text-center">
                                            <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                                        </div-->
                                    </form>
                                </li>
                            </ul>
               
                    @else
                        <a class="navbar-brand btn  dropdown-toggle" data-toggle="dropdown">Login</a>  
                            
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-3 py-2">
                                <form class="form" action="{{ url('login') }}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" name="password" required="">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>

                                    </form>
                                </li>
                            </ul>

                       
                    @endauth
                </div>
            @endif
        
 
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
  