 @extends('layout')
   <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.html">BIO-UES</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Quienes somos</a></li>
                        <li class="nav-item"><a class="nav-link" href="post.html">Contactenos</a></li>
                        @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Entrar</a></li>                   
                         @else
                          <li class="nav-item"><a class="nav-link" href="{{ url('/gestion') }}">Gestiones BIO-UES</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar Sesión </a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
 <!-- Page Header-->
        <header class="masthead" style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>Biodiversidad de El Salvador</h1>
                            <span class="subheading">Universidad de El Salvador</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
 <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Desarrollado para la gestión de las especies naturales de la biodiversidad salvadoreña</h2>
                            <h3 class="post-subtitle">Más de dos mil especies registradas. </h3>
                        </a>
                        <p class="post-meta">
                            Sitio creado para la
                            <a href="#!">Escuela de Biologia</a>
                            de la Universidad de El Salvador
                        </p>
                    </div>
                    <hr />
                   
                    <hr />
                    <!-- Pager-->
                    <div class="clearfix"><a class="btn btn-primary float-right" href="#!">Noticias →</a></div>
                </div>
            </div>
        </div>
