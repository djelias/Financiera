@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> ACTUALIZACION DE DATOS DE CLASE</h3>
    	<br>
      {{ Form::model($clases,['route'=>['clase.update',$clases->id],'method'=>'PATCH']) }}
      @include('clase.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection