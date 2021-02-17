@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Filum</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dominio : </strong>
            {{ $filums->Reino->Dominio->nombreDominio}} 
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Reino : </strong>
            {{ $filums->Reino->nombreReino}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Filum : </strong>
            {{ $filums->nombreFilum}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('filum.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
