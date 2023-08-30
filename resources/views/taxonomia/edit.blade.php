@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualización de Clasificación Taxónomica</h3>
    	<br>
      {{ Form::model($taxonomias,['route'=>['taxonomia.update',$taxonomias->id],'method'=>'PATCH']) }}
      @include('taxonomia.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection