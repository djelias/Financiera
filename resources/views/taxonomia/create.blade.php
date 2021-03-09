@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center">Clasificación Taxónomica</h3>
    	<br>
      {{ Form::open(['route'=>'taxonomia.store', 'method'=>'POST']) }}
        @include('taxonomia.form_master')
      {{ form::close() }}
    </div>
  </div>
  
@endsection