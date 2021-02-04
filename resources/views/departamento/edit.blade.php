@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de colecciones</h3>
    	<br>
      {{ Form::model($departamentos,['route'=>['departamento.update',$departamentos->id],'method'=>'PATCH']) }}
      @include('departamento.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection