@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> ACTUALIZACION DE DATOS DE FILUM</h3>
    	<br>
      {{ Form::model($filums,['route'=>['filum.update',$filums->id],'method'=>'PATCH']) }}
      @include('filum.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection