@extends('home')
@section('container')
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

            <div class="container">
                            <a class="navbar-brand" href="{{ url('/home') }}">
    <img src="startbootstrap-clean-blog-gh-pages/assets/img/ues.svg" width="90" height="90" alt="">
  </a>
                <a class="navbar-brand" href="index.html">BIO-UES</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/quienes_somos') }}">Quienes somos</a></li>
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
        <header class="masthead" style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/Maquilishuat.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>Quienes Somos</h1>
                            <span class="subheading">BIO UES</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
 <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a >
                            <h2 class="post-title">BIO-UES  es una plataforma para el almacenamiento de datos sobre las especies naturales administrado por la Escuela de Biología de la Universidad de El Salvador. Podrás encontrar la siguiente informacion:</h2>
                        
                        </a>
                        <p class="post-meta">
                              <ul>
                            <li>Clasificación taxonomica de las especies registradas de la Biodiversidad salvadoreña.</li>
                            <li>Catalogo con las colecciones que se encuentran en la Escuela de Biología de la UES.</li>
                            <li>Datos de barcoding de aquellas especies que ya han sido analizadas.</li>
                            <li>Mapas de ubicaciones de las diferentes especies.</li>
                        </ul>
                        </p>
                    </div>
                    <hr />
                   
                    <hr />
                    <!-- Pager-->
                    <div class="clearfix"><a class="btn btn-primary float-right" href="#!">Noticias →</a></div>
                </div>
            </div>
        </div>

       <!-- <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                     <!-- <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                     <!-- <hr class="my-4" />
                    <!-- Post preview-->
                  <!--    <div class="post-preview">
                        <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 18, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                   <!--   <hr class="my-4" />
                    <!-- Post preview-->
                    <!--  <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Science has not yet mastered prophecy</h2>
                            <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next ten.</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on August 24, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                   <!--   <hr class="my-4" />
                    <!-- Post preview-->
                     <!-- <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Failure is not an option</h2>
                            <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on July 8, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <!--  <hr class="my-4" />
                    <!-- Pager-->
                     <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>-->
@endsection
