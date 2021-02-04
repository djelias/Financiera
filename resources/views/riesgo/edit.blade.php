@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de riesgos</h3>
    	<br>
      {{ Form::model($riesgos,['route'=>['riesgo.update',$riesgos->id],'method'=>'PATCH']) }}
      @include('riesgo.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection