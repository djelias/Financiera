@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Especimen</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Código de Especimen : </strong>
            {{ $especimens->codigoEspecimen}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Especie : </strong>
            {{ $especimens->Especie->nombreEspecie}} 
        </div>
    </div> 
</div>

<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cantidad de muestras : </strong>
            {{ $especimens->cantidad}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Caracteristicas: </strong>
            {{ $especimens->caracteristicas}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Colector: </strong>
            {{ $especimens->colector}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha de colecta: </strong>
            {{ $especimens->fechaColecta}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Hora de colecta: </strong>
            {{ $especimens->horaSecuenciacion1}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Latitud: </strong>
            {{ $especimens->latitud}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Longitud: </strong>
            {{ $especimens->longitud}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Peso: </strong>
            {{ $especimens->peso}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tamaño: </strong>
            {{ $especimens->tamano}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Técnica de Recolección: </strong>
            {{ $especimens->tecnicaRecoleccion}} 
        </div>
    </div> 
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo de Muestra: </strong>
            {{ $especimens->tipoMuestra}} 
        </div>
    </div> 
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('especimen.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
