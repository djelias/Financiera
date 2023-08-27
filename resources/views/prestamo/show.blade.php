@extends ('layout')

@section('container')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Detalle del prestamo</h3>
            <br>
        </div>
    </div>
</div>
    <div style="float:left; width:50%" >

<?php 
$idP = $prestamos->codigoPrestamo;
$idprestamo = $prestamos->id;
$importe = $prestamos->cantidad;
$interest = $prestamos->tasa;
$anos = $prestamos->tiempo;

 ?>

 <?php


    $deuda=$importe;
    $deuda2=$importe;
    $anos=$anos;
    $anos2=$anos;
    $interes=$interest;
    $totalint=0;
 
    // hacemos los calculos...
    $interes=($interes/100);
    $m=($interes*(pow((1+$interes),($anos*12)))*$deuda)/((pow((1+$interes),($anos*12)))-1);
    //$m=($deuda*$interes*(pow((1+$interes),($anos*12))))/((pow((1+$interes),($anos*12)))-1);
 
    echo "Identificador: ".$idP." ";
    echo "<br>Capital Inicial: $".number_format($deuda,2,",",".")." ";
    echo "<br>Tasa de interes: ".number_format($interest,0,",",".")." %";
    echo "<br>Duracion en años: ".number_format($anos,0,",",".")." ";
    echo "<br>Cuota a pagar mensualmente: $".number_format($m,2,".",",")." ";
    ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Mes</th>
            <th>Intereses</th>
            <th>Amortización</th>
            <th>Capital<br> Pendiente</th>
        </tr>
        <?php
        // mostramos todos los meses...
        for ($i=1;$i<=$anos*12;$i++) {
            echo "<tr>";
                echo "<td align=right>".$i."</td>";
                $totalint=$totalint+($deuda*$interes);
                echo "<td align=right>".number_format($deuda*$interes,2,".",",")."</td>";
                echo "<td align=right>".number_format($m-($deuda*$interes),2,".",",")."</td>";
 
                $deuda=$deuda-($m-($deuda*$interes));
                if ($deuda<0) {
                    echo "<td align=right>0</td>";
                } else {
                    echo "<td align=right>".number_format($deuda,2,".",",")."</td>";
                }
            echo "</tr>";
        }
        
        ?>
    </table>
    Pago total de intereses : <?php echo number_format($totalint,2,".",",")?> $

    </div>

    <div style="float:left; width:50%">

<?php


    $deuda=$importe;
    $deuda2=$importe;
    $anos=$anos;
    $anos2=$anos;
    $interes=$interest;
    $totalint=0;
 
    // hacemos los calculos...
    $interes=($interes/100);
    $m=($interes*(pow((1+$interes),($anos*12)))*$deuda)/((pow((1+$interes),($anos*12)))-1);
    //$m=($deuda*$interes*(pow((1+$interes),($anos*12))))/((pow((1+$interes),($anos*12)))-1);
 
    echo "Identificador: ".$idP." ";
    echo "<br>Capital Inicial: $".number_format($deuda,2,".",",")." ";
    echo "<br>Tasa de interes: ".number_format($interest,0,".",",")." %";
    echo "<br>Duracion en años: ".number_format($anos,0,".",",")." ";
    echo "<br>Cuota a pagar mensualmente: $".number_format($m,2,".",",")." ";
    ?>

    <table border="1" cellpadding="7" cellspacing="0">
        <tr>
            <th>Mes</th>
            <th>Pago</th>
            <th>Intereses</th>
            <th>Amortización</th>
            <th>Capital<br> Pendiente</th>
        </tr>
        <?php 
        $no=1;
        $capitalnuevo = 0;
        $totalint = 0;
        $tintereses = 0;
        $tcapitalpagado = 0;
        $capitalnuevo = $prestamos->cantidad;


         ?>
    @foreach ($pagos as $key => $value)
    @if($value->idprest2 == $idprestamo)
    <?php 

    $tintereses = $value->intereses;
    $tintereses = number_format($value->intereses,2,".",",");
    $tcapitalpagado = $value->capitalpagado;
    $tcapitalpagado = number_format($tcapitalpagado,2,".",",");
    $totalint = $totalint + $tintereses;
    $capitalnuevo = $capitalnuevo - $value->capitalpagado;
    //$capitalnuevo = number_format($capitalnuevo,2,".",",");
    ?>
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->cantidad }}</td>
        <td>{{ $tintereses }}</td>
        <td>{{ $tcapitalpagado }}</td>
        <td>{{ $capitalnuevo }}</td>
      </tr>
      @endif
    @endforeach
    </table>
    Pago total de intereses : <?php echo number_format($totalint,2,".",",")?> $

    </div>
    <div style="float:left; width:100%">
            <br>
            <a class="btn btn-primary" href="{{ route('prestamo.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>
    </div>

@endsection
