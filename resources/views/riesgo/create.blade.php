@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Riesgos</h3>
    	<br>
      {{ Form::open(['route'=>'riesgo.store', 'method'=>'POST']) }}
        @include('riesgo.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection
