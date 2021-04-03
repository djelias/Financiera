@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> ACTUALIZACION DE DATOS DE GENERO</h3>
    	<br>
      {{ Form::model($generos,['route'=>['genero.update',$generos->id],'method'=>'PATCH']) }}
      @include('genero.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection