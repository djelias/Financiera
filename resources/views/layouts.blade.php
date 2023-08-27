<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>EM&ASOCIADOS</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/home') }}">
    <img src="startbootstrap-clean-blog-gh-pages/assets/img/logo.jpg" width="70" height="70" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">EM&ASOCIADOS</a>
      </li>

      @can('Dominios')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contabilidad
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @can('Dominios')
          <a class="dropdown-item" href="{{ route('contribuyente.index') }}">Gestión de Contribuyentes</a>
          @endcan
          @can('Dominios')
          <a class="dropdown-item" href="{{ route('catcuenta.index') }}">Gestión de Cuentas</a>
          @endcan
          @can('Dominios')
          <a class="dropdown-item" href="{{ route('libcompras.index') }}">Gestión de Compras</a>
          @endcan
          
        </div>
      </li>
      @endcan

      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Colecciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @can('Colecciones')
          <a class="dropdown-item"  href="{{ route('coleccion.index') }}">Colecciones</a>
          <a class="dropdown-item"  href="{{ route('prestatario.index') }}">Prestatarios</a>
          @endcan
          @can('Taxonomias')
          <a class="dropdown-item"  href="{{ route('taxonomia.index') }}">Taxonomias</a>
          @endcan
          @can('Especimenes')
          <a class="dropdown-item" href="{{ route('especimen.index') }}">Especímenes</a>
          @endcan
        </div>
      </li>
@can('Investigaciones')
 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Investigaciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"  href="{{ route('investigacion.index') }}"> Gestión de Investigaciones</a>
        @can('TiposInvestigaciones')
         <a class="dropdown-item"  href="{{ route('tipoInvestigacion.index') }}"> Gestión Tipo de Investigaciones</a>
         @endcan
         @can('Publicaciones')
         <a class="dropdown-item"  href="{{ route('publicacion.index') }}"> Gestión Publicaciones</a>
         @endcan
          </div>
      </li>
@endcan

 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Datos Estadisticos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"  href="{{ route('especieAmenazada.index') }}"> Especies Amenazadas</a>
          <a class="dropdown-item"  href="{{ route('riesgo.index') }}"> Gestión de Riesgos</a>
          <a class="dropdown-item"  href="{{ route('zona.index') }}"> Gestión de Zonas</a>
         <a class="dropdown-item"  href="{{ route('departamento.index') }}"> Gestión de Departamentos</a>
         <a class="dropdown-item"  href="{{ route('municipio.index') }}"> Gestión de Municipios</a>
          </div>
      </li>

<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Barcoding
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @can('Secuencias')
          <a class="dropdown-item"  href="{{ route('secuencia.index') }}"> Secuenciación</a>
          @endcan
          <a class="dropdown-item"  href="https://www.boldsystems.org/index.php/Public_BINSearch?searchtype=records"> Bold System</a>
          </div>
      </li>
-->
      @can('Usuarios')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @can('Usuarios')
          <a class="dropdown-item"  href="{{ route('users.index') }}"> Usuarios</a>
          @endcan
          @can('Roles')
          <a class="dropdown-item"  href="{{ route('roles.index') }}"> Roles</a>
          @endcan
          <a class="dropdown-item"  href="{{ route('bitacoras') }}"> Bitacoras</a>
          </div>
      </li>
      @endcan
      
    </ul>
  </div>
  <ul class="navbar-nav mr-nav">
  @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Entrar</a></li>                   
  @else
            <li class="nav-item dropdown"> 
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Usuario: {{ Auth::user()->name }}</a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="{{ url('/home') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Cerrar Sesión</a>
               </div>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
            </form>
                
            </li>
           
            
@endif
</ul>
</nav>
     
    @yield("header")
        <!-- Main Content-->
    
      <div class="container">
         @yield("container")
          @include('sweetalert::alert')
        <hr />
</div>
        <!-- Footer-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; EM & Asociados 2023</p>
                    </div>
                </div>
            </div>
            <div>
                <nav class="navbar navbar-expand-lg fixed-bottom" style="background-color: #D7D2D1 ;">
        <a class="navbar-brand"> EM & Asociados </a>
            <div >&emsp;<span class="glyphicon glyphicon-copyright-mark"><span id= "fecha"></span></div>
             </nav>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
         <script>
        var f=new Date();
        var fecha = f.getDate() + '-' + (f.getMonth() + 1) + '-' +f.getFullYear();
        var hora = f.getHours() + ':' + f.getMinutes();
        var fechaYhora = fecha + ' , '+hora;
        document.getElementById('fecha').innerHTML = fechaYhora;

</script>
    </body>
</html>
