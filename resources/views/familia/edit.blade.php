@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> ACTUALIZACION DE DATOS DE FAMILIA</h3>
    	<br>
      {{ Form::model($familias,['route'=>['familia.update',$familias->id],'method'=>'PATCH']) }}
      @include('orden.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection