@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Datos de Aprobacion</h3>
    	<br>
      {{ Form::open(['route'=>'aprobacion.store', 'method'=>'POST']) }}
        @include('aprobacion.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection
