@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Familia</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dominio : </strong>
            {{ $familias->Orden->Clase->Filum->Reino->Dominio->nombreDominio}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Reino : </strong>
            {{ $familias->Orden->Clase->Filum->Reino->nombreReino}} 
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Filum : </strong>
            {{ $familias->Orden->Clase->Filum->nombreFilum}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Clase : </strong>
            {{ $familias->Orden->Clase->nombreClase}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Orden : </strong>
            {{ $familias->Orden->nombreOrden}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Familia : </strong>
            {{ $familias->nombreFamilia}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('orden.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
