 @extends('layout')
 @section('container')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/home') }}">
    <img src="startbootstrap-clean-blog-gh-pages/assets/img/ues.svg" width="70" height="70" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">BIO-UES</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Especies
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('dominio.index') }}">Gestión de Dominios</a>
          <a class="dropdown-item" href="{{ route('reino.index') }}">Gestión de Reinos</a>
           <a class="dropdown-item" href="{{ route('filum.index') }}">Gestión de Filums</a>
           <a class="dropdown-item" href="{{ route('clase.index') }}">Gestión de Clases</a>
           <a class="dropdown-item" href="{{ route('orden.index') }}">Gestión de Orden</a>
           <a class="dropdown-item" href="{{ route('familia.index') }}">Gestión de Familias</a>
           <a class="dropdown-item" href="{{ route('genero.index') }}">Gestión de Géneros</a>
           <a class="dropdown-item" href="{{ route('especie.index') }}">Gestión de Especies</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Colecciones
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"  href="{{ route('taxonomia.index') }}">Taxonomias</a>
          <a class="dropdown-item" href="{{ route('especimen.index') }}">Especímenes</a>
        </div>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav mr-nav">
  @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Entrar</a></li>                   
  @else
   
            <li class="nav-item"><a class="nav-link"  href="{{ url('/home') }}" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Cerrar Sesión </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
            </form>
        </li>
            
@endif
</ul>
</nav>

  <header class="masthead" style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/jaguar.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>BIENVENIDOS</h1>
                            <span class="subheading">Tu plataforma completa de acceso a la información sobre las especies de la Biodiversidad salvadoreña.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2>Sobre BIO-UES</h2>
                        <p class="lead">BIO-UES  es una plataforma para el almacenamiento de datos sobre las especies naturales administrado por la Escuela de Biología de la Universidad de El Salvador. Podrás encontrar la siguiente informacion:</p>
                        <ul>
                            <li>Clasificación taxonomica de las especies registradas de la Biodiversidad salvadoreña.</li>
                            <li>Catalogo con las colecciones que se encuentran en la Escuela de Biología de la UES.</li>
                            <li>Datos de barcoding de aquellas especies que ya han sido analizadas.</li>
                            <li>Mapas de ubicaciones de las diferentes especies.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
       <!--  <section class="bg-light" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Services we offer</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2>Contact us</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
                    </div>
                </div>
            </div>
        </section>-->
    @endsection