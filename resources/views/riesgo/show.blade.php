@extends('layouts.app')
@section('content')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Categorias de Riesgo</h3>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Categoria Riesgo : </strong>
            {{ $riesgoes->nombreRiesgo}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('riesgo.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection         