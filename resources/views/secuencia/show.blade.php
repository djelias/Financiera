@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la secuencia</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre : </strong>
            {{ $secuencias->secuenciaObtenida}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Método de Secuenciación : </strong>
            {{ $secuencias->metodoSecuenciacion}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lugar de Secuenciación : </strong>
            {{ $secuencias->lugarSec}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Hora de Secuenciación : </strong>
            {{ $secuencias->horaSec}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha de Secuenciación  </strong>
            {{ $secuencias->fechaSec}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Responsable de Secuenciación : </strong>
            {{ $secuencias->responsableSec}}
        </div>
    </div>
</div>


            <br/>
            <a class="btn btn-primary" href="{{ route('secuencia.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
   

@endsection
