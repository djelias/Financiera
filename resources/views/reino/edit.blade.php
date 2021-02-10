@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> ACTUALIZACION DE DATOS DE REINO</h3>
    	<br>
      {{ Form::model($reinos,['route'=>['reino.update',$reinos->id],'method'=>'PATCH']) }}
      @include('reino.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection