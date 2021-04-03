@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Genero</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dominio : </strong>
            {{ $generos->Familia->Orden->Clase->Filum->Reino->Dominio->nombreDominio}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Reino : </strong>
            {{ $generos->Familia->Orden->Clase->Filum->Reino->nombreReino}} 
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Filum : </strong>
            {{ $generos->Familia->Orden->Clase->Filum->nombreFilum}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Clase : </strong>
            {{ $generos->Familia->Orden->Clase->nombreClase}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Orden : </strong>
            {{ $generos->Familia->Orden->nombreOrden}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Familia : </strong>
            {{ $generos->Familia->nombreFamilia}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Genero : </strong>
            {{ $generos->nombreGenero}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('genero.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
