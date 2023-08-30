@extends('layouts.app')
@section('content')
{!! $map['js'] !!}


<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Especimen</h3>
            <br>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
              <div class="form-group">
            <strong>Código de Especimen : </strong>
            {{ $especimens->codigoEspecimen}} 
            </div>

        <div class="form-group">
            <strong>Especie : </strong>
            {{ $especimens->Investigacion->nombreInv}} 
        </div>

        <div class="form-group">
            <strong>Cantidad de muestras : </strong>
            {{ $especimens->cantidad}} 
        </div>

        <div class="form-group">
            <strong>Caracteristicas: </strong>
            {{ $especimens->caracteristicas}} 
       
        </div>
        <div class="form-group">
            <strong>Colector: </strong>
            {{ $especimens->colector}} 
        </div>
        <div class="form-group">
            <strong>Fecha de colecta: </strong>
            {{ $especimens->fechaColecta}} 
        </div>
        <div class="form-group">
            <strong>Hora de colecta: </strong>
            {{ $especimens->horaSecuenciacion1}} 
        </div>
         <div class="form-group">
            <strong>Latitud: </strong>
            {{ $especimens->latitud}} 
        </div>
        <div class="form-group">
            <strong>Longitud: </strong>
            {{ $especimens->longitud}} 
        </div>
        <div class="form-group">
            <strong>Peso: </strong>
            {{ $especimens->peso}} 
       
        </div>
        <div class="form-group">
            <strong>Tamaño: </strong>
            {{ $especimens->tamano}} 
        </div>
        <div class="form-group">
            <strong>Técnica de Recolección: </strong>
            {{ $especimens->tecnicaRecoleccion}} 
        </div>

        <div class="form-group">
            <strong>Tipo de Muestra: </strong>
            {{ $especimens->tipoMuestra}} 

        </div>
    </div>
    <div class="col-md-8">
        {!! $map['html'] !!}
           
    </div>
    </div>
    <br>
    <div>
        <strong>Imágenes de la Muestra: </strong>
    </div>
    <br>
    <div>
        <img src="{{URL::asset('especimens/'.$especimens->imagen)}}" alt="" width="350" height="350">
    </div>
    <div style="text-align:center;">
        <br/>
            <a class="btn btn-primary" href="{{ route('especimen.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
            <a class="btn btn-primary" href="{{ route('map', $especimens->id) }}"> <i class="glyphicon glyphicon-arrow-left"> Mapas</i></a> 
    </div>




@endsection
