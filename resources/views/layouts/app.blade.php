        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BIO-UES</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <!-- CSS only -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   


</head>
<body>

    <div id="app" style="overflow-y: auto; overflow-x: hidden;"  >

        
        <nav class="navbar navbar-expand-lg navbar-light bg-light"role="navigation" style="background-color: #D7D2D1 ;">
            <div class="container">
                <img src="{{URL::asset('/img/ues.svg')}}" alt="profile Pic" height="65" width="55">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                     <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand" href="{{ url('/gestion') }}">BIO-UES</a>
                </div>


                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                  <!--   <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                         <!--@guest
                            <li><a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span>{{ __('Entrar') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span>{{ __('Registrarse') }}</a></li>
                        @else

                        @can('usuario-list')
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manejar Usuarios</a></li>
                        @endcan

                        @can('role-list')   
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manejar Roles</a></li>
                        @endcan
                        
                            <li><a class="nav-link" href="{{ route('departamento.index') }}">Manejar Depto</a></li>
                            

                        <li><a class="nav-link" href="{{ route('municipio.index') }}">
                            Manejar Municipio</a></li>
                    

                        <li><a class="nav-link" href="{{ route('zona.index') }}">
                            Manejar Zona</a></li>
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>-->

                    
                </div>
            </div>
    </nav>
</div>
<div class="container">
    @yield('content')
    @include('sweetalert::alert')
</div>
<br>
<br>
<br>
<br>
        
            <style>
    .bs-example{
        margin: 20px;
    }
    body{
        padding-bottom: 70px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-lg fixed-bottom" style="background-color: #D7D2D1 ;">
        <a class="navbar-brand">Copyright &copy; BIO-UES </a>
            <div >&emsp;<span class="glyphicon glyphicon-copyright-mark"><span id= "fecha"></span></div>
             </nav>
        </div>
   


    
</body></html>
 
 <script>
        var f=new Date();
        var fecha = f.getDate() + '-' + (f.getMonth() + 1) + '-' +f.getFullYear();
        var hora = f.getHours() + ':' + f.getMinutes();
        var fechaYhora = fecha + ' , '+hora;
        document.getElementById('fecha').innerHTML = fechaYhora;

</script>
