@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Datos de investigacion</h3>
    	<br>
      {{ Form::open(['route'=>'investigacion.store', 'method'=>'POST']) }}
        @include('investigacion.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection