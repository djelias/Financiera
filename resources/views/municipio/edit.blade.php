@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> ACTUALIZACION DE DATOS DE MUNICIPIO</h3>
    	<br>
      {{ Form::model($municipios,['route'=>['municipio.update',$municipios->id],'method'=>'PATCH']) }}
      @include('municipio.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection