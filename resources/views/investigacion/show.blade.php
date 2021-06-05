@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Investigacion</h3>
            <br>
        </div>
    </div>
</div>

<br>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre : </strong>
            {{ $investigaciones->nombreInv}}
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha de Ingreso : </strong>
            {{ $investigaciones->fechaIngreso}}
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lugar Investigacion : </strong>
            {{ $investigaciones->lugarInv}}
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Responsable : </strong>
            {{ $investigaciones->responsableInv}}
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Objetivo : </strong>
            {{ $investigaciones->objetivo}}
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contacto : </strong>
            {{ $investigaciones->contacto}}
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Unidad Encargada : </strong>
            {{ $investigaciones->unidadEncargada}}
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Otras Instituciones : </strong>
            {{ $investigaciones->otrasInstit}}
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Documentacion: </strong>
            {{ $investigaciones->documentacion}}
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion : </strong>
            {{ $investigaciones->descripcionInvestigacion}}
        </div>
    </div>  
</div>

<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Correo Electronico : </strong>
            {{ $investigaciones->correoElectronico}}
        </div>
    </div>
</div>



<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Municipio : </strong>
            {{ $investigaciones->Municipio->nombreMunicipio}} 
        </div>
    </div>
            <br/>
<br>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Departamento : </strong>
            {{ $investigaciones->Municipio->Departamento->nombreDepto}} 
        </div>
    </div>
            <br/>






            <a class="btn btn-primary" href="{{ route('investigacion.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    
</div>
@endsection 
  



