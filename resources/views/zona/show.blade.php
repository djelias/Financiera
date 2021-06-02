@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la zona</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre : </strong>
            {{ $zonas->nombreZona}} 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lugar : </strong>
            {{ $zonas->lugarZona}} 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Latitud : </strong>
            {{ $zonas->latitudZona}} 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Longitud: </strong>
            {{ $zonas->longitudZona}} 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Habitat : </strong>
            {{ $zonas->habitatZona}} 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion : </strong>
            {{ $zonas->descripcionZona1}} 
        </div>
    </div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Municipio : </strong>
            {{ $zonas->Municipio->nombreMunicipio}} 
        </div>
    </div>


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Departamento : </strong>
            {{ $zonas->Municipio->Departamento->nombreDepto}} 
        </div>
    </div>
            <br/>

            <br/>
            <a class="btn btn-primary" href="{{ route('zona.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
