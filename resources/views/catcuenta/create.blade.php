@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3 style="text-align:center"> DATOS DE LA CUENTA</h3>
      <br>
      {{ Form::open(['route'=>'catcuenta.store', 'method'=>'POST']) }}
        @include('catcuenta.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection
