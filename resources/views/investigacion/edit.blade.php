@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de investigacions</h3>
    	<br>
      {{ Form::model($investigaciones,['route'=>['investigacion.update',$investigaciones->id],'method'=>'PATCH']) }}
      @include('investigacion.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection