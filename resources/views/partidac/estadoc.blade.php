@extends ('layout')
@section('container')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>BALANCE DE CUENTAS</h2>
      <br>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
   @if ($message = Session::get('danger'))
      <div class="alert alert-danger">
          <p>{{ $message }}</p>
      </div>
  @endif
      <div>
        
        {!! Form::open(['route'=>'partidac.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
        {!! Form::close()!!}
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th style="text-align:center">Codigo</th>
      <th style="text-align:center">Nombre</th>
      <th style="text-align:center">Saldo inicial</th>
      <th style="text-align:center">Debe</th>
      <th style="text-align:center">Haber</th>
      <th style="text-align:center">Saldo</th>
    </tr>
    <?php $no=1;
    $debet = 0;
    $debetc = 0;
    $debetc2 = 0;
    $debetc3 = 0;
    $debets = 0;
    $debetcd = 0;
    $habert = 0;
    $habertc = 0;
    $habertc2 = 0;
    $habertc3 = 0;
    $haberts = 0;
    $habertcd = 0;
    $saldot = 0;
    $aux = 0;
    $cor = "0";
     ?>
    @foreach ($catcuentas as $key => $value)
    <?php $cor = $value->cuentaDetalle;
    $cor2 = "0";?>
    <tr>
      @if(empty($value->subcuenta) && empty($value->cuentaDetalle))
        <td align="left">{{ $value->cuenta }}</td>
      @elseif(empty($value->cuenta) && empty($value->cuentaDetalle))
        <td align="left">{{ $value->subcuenta }}</td>
      @elseif(empty($value->cuenta) && empty($value->subcuenta))
        <td align="left">{{ $value->cuentaDetalle }}</td>
      @endif
        <td align="left">{{ $value->rubroDesc }}</td>
        <td>{{ $value->saldoInicial }}</td>
    @foreach ($partidac as $key => $value2)
    @if(empty($value->subcuenta) && empty($value->cuentaDetalle))
    <?php $cor2 = $value2->idcatalogo ?>

        @if(substr($value2->idcatalogo, 0, 1)==$value->cuenta)
        <?php 
              $debetc = $debetc + $value2->debe;
              $habertc = $habertc + $value2->haber;
     ?>
     @endif
     @if(substr($value2->idcatalogo, 0, 2)==$value->cuenta)
        <?php 
              $debetc2 = $debetc2 + $value2->debe;
              $habertc2 = $habertc2 + $value2->haber;
     ?>
     @endif
     @if(substr($value2->idcatalogo, 0, 4)==$value->cuenta)
        <?php 
              $debetc3 = $debetc3 + $value2->debe;
              $habertc3 = $habertc3 + $value2->haber;
              //echo substr($value2->idcatalogo, 0, 4);
              //echo $value2->idcatalogo;
              //echo $value->cuenta;
              //echo "$debetc3";
     ?>
     @endif
     @elseif(empty($value->cuenta) && empty($value->cuentaDetalle))
     @if(substr($value2->idcatalogo, 0, 6)==$value->subcuenta)
        <?php 
              $debets = $debets + $value2->debe;
              $haberts = $haberts + $value2->haber;
     ?>
     @endif
     @elseif(empty($value->cuenta) && empty($value->subcuenta))
     @if(substr($value2->idcatalogo, 0, 8)==$value->cuentaDetalle)
        <?php 
              $debetcd = $debetcd + $value2->debe;
              $habertcd = $habertcd + $value2->haber;
     ?>
     @endif
     @endif
     
    @endforeach
    @if(empty($value->subcuenta) && empty($value->cuentaDetalle) && $debetc!=0)
        <td>{{ $debetc }}</td>
        <td>{{ $habertc }}</td>
        <?php 
        $saldot = $value->saldoInicial + $debetc - $habertc;
         ?>
        <td>{{ $saldot }}</td>

        <?php
    $debetc = 0;
    $habertc = 0;
    $saldot = 0;
    $cor = "0";
    $cor2 = "0";
     ?>
     @elseif(empty($value->subcuenta) && empty($value->cuentaDetalle) && $debetc2!=0)
     <td>{{ $debetc2 }}</td>
        <td>{{ $habertc2 }}</td>
        <?php 
        $saldot = $value->saldoInicial + $debetc2 - $habertc2;
         ?>
        <td>{{ $saldot }}</td>
        <?php
    $debetc2 = 0;
    $habertc2 = 0;
    $saldot = 0;
    $cor = "0";
    $cor2 = "0";
     ?>
     @elseif(empty($value->subcuenta) && empty($value->cuentaDetalle) || $debetc3!=0)
     <td>{{ $debetc3 }}</td>
        <td>{{ $habertc3 }}</td>
        <?php 
        $saldot = $value->saldoInicial + $debetc3 - $habertc3;
         ?>
        <td>{{ $saldot }}</td>
        <?php
    $debetc3 = 0;
    $habertc3 = 0;
    $saldot = 0;
    $cor = "0";
    $cor2 = "0";
     ?>
     @elseif(empty($value->cuenta) && empty($value->cuentaDetalle) || $debets!=0)

     <td>{{ $debets }}</td>
        <td>{{ $haberts }}</td>
        <?php 
        $saldot = $value->saldoInicial + $debets - $haberts;
         ?>
        <td>{{ $saldot }}</td>
        <?php
    $debets = 0;
    $haberts = 0;
    $saldot = 0;
    $cor = "0";
    $cor2 = "0";
     ?>

     @elseif(empty($value->cuenta) && empty($value->subcuenta) || $debetcd!=0)

     <td>{{ $debetcd }}</td>
        <td>{{ $habertcd }}</td>
        <?php 
        $saldot = $value->saldoInicial + $debetcd - $habertcd;
         ?>
        <td>{{ $saldot }}</td>
        <?php
    $debetcd = 0;
    $habertcd = 0;
    $saldot = 0;
    $cor = "0";
    $cor2 = "0";
     ?>
        @endif

      </tr>

    @endforeach
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
@endsection
