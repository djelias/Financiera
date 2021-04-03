@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
    	<h3 style="text-align: center;"> ACTUALIZACION DE DATOS DEL ESPECIMEN </h3>
    	<br>
      {{ Form::model($especimens,['route'=>['especimen.update',$especimens->id],'method'=>'PATCH']) }}
      @include('especimen.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection