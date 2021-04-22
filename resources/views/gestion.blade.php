@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/gestion') }}">MENU</a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Especies
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('dominio.index') }}">Gestión de Dominios </a></li>
          <li><a href="{{ route('reino.index') }}">Gestión de Reinos </a></li>
          <li><a href="{{ route('filum.index') }}">Gestión de Filums </a></li>
          <li><a href="{{ route('clase.index') }}">Gestión de Clases</a></li>
          <li><a href="{{ route('orden.index') }}">Gestión de Orden</a></li>
          <li><a href="{{ route('familia.index') }}">Gestión de Familias</a></li>
          <li><a href="{{ route('genero.index') }}">Gestión de Géneros</a></li>
          <li><a href="{{ route('especie.index') }}">Gestión de Especies</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Colecciones
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('taxonomia.index') }}">Taxonomias</a></li>
         <li><a href="{{ route('especimen.index') }}">Especímenes</a></li>
        </ul>
      </li>
    </ul>
  </div>  
   </div>
 </nav>
        <br>
        <div class="row">
          <div class="col-sm-5">
             <div class="text-left">
                <h2><strong>BIENVENIDO / A</strong></h2>
              </div>
              <br>
              <br>
              <div class="text-left">
                <h4>Tu plataforma completa de acceso a la información sobre las especies de la Biodiversidad salvadoreña.</h4>
                <br>
                <h4>BIO-UES  es una plataforma para el almacenamiento de datos sobre las especies naturales administrado por la Escuela de Biología de la Universidad de El Salvador.  </h4>
              </div>
          </div>
         <div class="col-sm-6">
           <div class="text-right">
                    <img src="{{URL::asset('/img/torogoz.jpg')}}" alt="profile Pic" height="350" width="450">
              
                </div>
        </div>
         </div>
           
         

          
                
            </div>

@endsection

