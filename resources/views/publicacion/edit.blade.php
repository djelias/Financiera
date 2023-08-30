@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de Publicaciones</h3>
    	<br>
      {{ Form::model($publicaciones,['route'=>['publicacion.update',$publicaciones->id],'method'=>'PATCH']) }}
      @include('publicacion.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection