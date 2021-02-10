@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de Secuencias</h3>
    	<br>
      {{ Form::model($secuencias,['route'=>['secuencia.update',$secuencias->id],'method'=>'PATCH']) }}
      @include('secuencia.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection