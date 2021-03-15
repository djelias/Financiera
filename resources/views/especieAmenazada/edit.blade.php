@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualización de Especies Amenazadas</h3>
    	<br>
      {{ Form::model($especieAmenazadas,['route'=>['especieAmenazada.update',$especieAmenazadas->id],'method'=>'PATCH']) }}
      @include('especieAmenazada.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection