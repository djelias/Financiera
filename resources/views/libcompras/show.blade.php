@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de la cuenta</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cuenta : </strong>
            {{ $catcuentas->cuenta}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Subcuenta : </strong>
            {{ $catcuentas->subcuenta}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cuenta detalle : </strong>
            {{ $catcuentas->cuentaDetalle}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rubro / Descripcion de la cuenta : </strong>
            {{ $catcuentas->rubroDesc}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estatus : </strong>
            {{ $catcuentas->estatus}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('catcuenta.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
