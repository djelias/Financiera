@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Especie Amenzada</h3>
            <br>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Riesgo : </strong>
            {{ $especieAmenazadas->Riesgo->catRiesgo}} 
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre Científico: </strong>
            {{ $especieAmenazadas->nomEspamen}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre Común : </strong>
            {{ $especieAmenazadas->nomComEspamen}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('especieAmenazada.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    

@endsection
