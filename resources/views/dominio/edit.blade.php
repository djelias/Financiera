@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de Dominios</h3>
    	<br>
      {{ Form::model($dominios,['route'=>['dominio.update',$dominios->id],'method'=>'PATCH']) }}
      @include('dominio.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection