@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	<h3 style="text-align:center"> Actualizacion de la Subcuenta</h3>
    	<br>
      {{ Form::model($catcuentas,['route'=>['catcuenta.update',$catcuentas->id],'method'=>'PATCH']) }}
      @include('catcuenta.form_master2')
      {{ Form::close() }}
    </div>
  </div>
@endsection