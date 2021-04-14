@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Taxonomía</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Numero de Voucher : </strong>
            {{ $taxonomias->numVoucher}} 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Código de Especímen: </strong>
            {{ $taxonomias->Especimen->codigoEspecimen}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre Común : </strong>
            {{ $taxonomias->nombreComun}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('taxonomia.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    

@endsection
