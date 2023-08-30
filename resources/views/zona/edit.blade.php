@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de zonas</h3>
    	<br>
      {{ Form::model($zonas,['route'=>['zona.update',$zonas->id],'method'=>'PATCH']) }}
      @include('zona.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection