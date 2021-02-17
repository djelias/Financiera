@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la Clase</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dominio : </strong>
            {{ $clases->Filum->Reino->Dominio->nombreDominio}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Reino : </strong>
            {{ $clases->Filum->Reino->nombreReino}} 
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Filum : </strong>
            {{ $clases->Filum->nombreFilum}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Clase : </strong>
            {{ $clases->nombreClase}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('clase.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
