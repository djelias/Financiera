@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Datos de Secuencia</h3>
    	<br>
      {{ Form::open(['route'=>'secuencia.store', 'method'=>'POST']) }}
        @include('secuencia.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection
