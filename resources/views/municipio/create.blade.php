@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center">Municipio</h3>
    	<br>
      {{ Form::open(['route'=>'municipio.store', 'method'=>'POST']) }}
        @include('municipio.form_master')
      {{ form::close() }}
    </div>
  </div>
  
@endsection