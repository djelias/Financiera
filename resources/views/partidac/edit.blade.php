@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de Prestatarios</h3>
    	<br>
      {{ Form::model($prestatarios,['route'=>['prestatario.update',$prestatarios->id],'method'=>'PATCH']) }}
      @include('prestatario.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection