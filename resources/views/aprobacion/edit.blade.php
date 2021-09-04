@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de Aprobacion</h3>
    	<br>
      {{ Form::model($aprobaciones,['route'=>['aprobacion.update',$aprobaciones->id],'method'=>'PATCH']) }}
      @include('aprobacion.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection