@extends('layouts.app')
@section('content')
  <div class="row">
    <div>
        <h3 style="text-align:center"> Consulta a BoldSystem </h3>
        <br>
    </div>
    {!! Form::open(['route'=>'consulta', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
    <div>
    <div class="row">
    <div class="col-sm-2">
      {!! form::label('taxon','Taxonomia') !!}
    </div>
    <div class="col-sm-4">
      <div class="form-group {{ $errors->has('taxon') ? 'has-error' : "" }}">
        <i>{{ Form::text('taxon',NULL, ['class'=>'form-control', 'id'=>'taxon', 'placeholder'=>'Taxonomia']) }}</i>
        <?php
          $taxon1 = 'taxon';
        ?>
        <div class="help-block" >
        <strong>{{ $errors->first('taxon', '**Ingrese datos válidos A-Z') }}</strong> 
      </div>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-2">
      {!! form::label('geo','Geolocalizacion') !!}
    </div>
    <div class="col-sm-4">
      <div class="form-group {{ $errors->has('geo') ? 'has-error' : "" }}">
        <i>{{ Form::text('geo',NULL, ['class'=>'form-control', 'id'=>'geo', 'placeholder'=>'Geolocalizacion']) }}</i>
        
        <div class="help-block" >
        <strong>{{ $errors->first('geo', '**Ingrese datos válidos A-Z') }}</strong> 
      </div>
      </div>
    </div>
    </div>

    <a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Consultar" href="{{ url('bold', ["$taxon1", "geo"]) }}">
    <i class="glyphicon">Consulta</i></a>

      
    <br>
       <div class="form-group text-center" >
      <a class="btn btn-danger btn-lg" href="{{ route('consulta') }}">Regresar</a>
    </div>

    </div>
@endsection
