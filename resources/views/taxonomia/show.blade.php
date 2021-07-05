@extends('layouts.app')
@section('content')
{!! $map['js'] !!}
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos de Taxonomía</h3>
            <br>
        </div>
    </div>
</div>

<table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Número de Voucher</th>
      <th style="text-align:center">Código de Especímen</th>
      <th style="text-align:center">Especie</th>
      <th style="text-align:center">Nombre Común</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($taxonomias as $key => $value)
    @if($value->idEspecie == $especies->id)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$value->Especimen->idEspecie}}</td>
        <td>{{$value->Especimen->codigoEspecimen}}</td>
        <td>{{$value->Especimen->Especie->nombreEspecie }}<br></td>
        <td>{{$value->nombreComun }}<br></td>
        <td></td>
      </tr>
      @endif
    @endforeach

    
  </table>

{!! $map['html'] !!}
            <br/>
            <a class="btn btn-primary" href="{{ route('taxonomia.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    

@endsection
