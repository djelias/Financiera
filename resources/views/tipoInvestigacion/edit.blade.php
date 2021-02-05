@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de Tipo de Investigaciones</h3>
    	<br>
      {{ Form::model($tipoInvestigaciones,['route'=>['tipoInvestigacion.update',$tipoInvestigaciones->id],'method'=>'PATCH']) }}
      @include('tipoInvestigacion.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection