<!doctype html>
<html lang="en">

<head>
    <title>Pole Position :: Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <!-- link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" /-->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="/" class="text-dark">Pole Position</a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item  
          @if (trim($__env->yieldContent('title')) == 'Resultados')
            active
          @endif
          ">
                        <a class="nav-link" href="{{ route ('resultados.create') }}">
                            <i class="material-icons">list_alt</i>
                            <p>Resultados</p>
                        </a>
                    </li>
                    <li class="nav-item  
          @if (trim($__env->yieldContent('title')) == 'Campeonatos')
            active
          @endif
          ">
                        <a class="nav-link" href="{{ route ('campeonatos.create') }}">
                            <i class="material-icons">language</i>
                            <p>Campeonato</p>
                        </a>
                    </li>
                    <li class="nav-item 
          @if (trim($__env->yieldContent('title')) == 'Carreras')
            active
          @endif
">
                        <a class="nav-link" href="{{ route ('circuitos.create') }}">
                            <i class="material-icons">location_ons</i>
                            <p>Circuitos</p>
                        </a>
                    </li>
                    <li class="nav-item  
          @if (trim($__env->yieldContent('title')) == 'Pilotos')
            active
          @endif
           ">
                        <a class="nav-link" href="{{ route ('pilotos.create') }}">
                            <i class="material-icons">assignment_ind</i>
                            <p>Pilotos</p>
                        </a>
                    </li>
                    <li class="nav-item @if (trim($__env->yieldContent('title')) == 'Escuderias')
            active
          @endif
          ">
                        <a class="nav-link" href="{{ route ('escuderias.create') }}">
                            <i class="material-icons">content_paste</i>
                            <p>Escuderias</p>
                        </a>
                    </li>
                    <li class="nav-item 
          @if (trim($__env->yieldContent('title')) == 'Participantes')
            active
          @endif
          ">
                        <a class="nav-link" href="{{ route ('participantes.create') }}">
                            <i class="material-icons">person</i>
                            <p>Participantes</p>
                        </a>
                    </li>
                    
                    <li class="nav-item 
          @if (trim($__env->yieldContent('title')) == 'Puntuaciones')
            active
          @endif
          ">
                        <a class="nav-link" href="/admin/puntuaciones">
                            <i class="material-icons">calculate</i>
                            <p>Puntuaciones</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">@yield('title')</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>

                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <!-- your content here -->

                    @yield('content')

                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">

                    <div class="copyright float-right">
                        &copy;
                        <script>
                        document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.chumy.es" target="_blank">Chumy</a>.
                    </div>
                    <!-- your footer here -->
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!--script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script-->
</body>

</html>