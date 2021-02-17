@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center">Filum</h3>
    	<br>
      {{ Form::open(['route'=>'filum.store', 'method'=>'POST']) }}
        @include('filum.form_master')
      {{ form::close() }}
    </div>
  </div>
  
@endsection