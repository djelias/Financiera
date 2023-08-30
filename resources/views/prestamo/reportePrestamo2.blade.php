<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link href="{{ public_path()}}/css/reportes.css" rel="stylesheet">


<head>

    <title>Prestamo{{ $prestamos->codigoPrestamo}}.pdf</title>

</head>

<body>

<div class="container-fluid">
    <div class="header">
                                <h5>Fecha: {{$fecha}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br>
                                <h5>Reporte del prestamo: {{ $prestamos->codigoPrestamo}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>

<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Detalle del prestamo</h3>
            <br>
        </div>
    </div>
</div>

<?php 
$idP = $prestamos->codigoPrestamo;
$idprestamo = $prestamos->id;
$importe = $prestamos->cantidad;
$interest = $prestamos->tasa;
$anos = $prestamos->tiempo;

 ?>


    <div style="float:left; width:70%">

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
            <th>Fecha de pago</th>
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
        <td>{{ $value->fechadepago }}</td>
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

    <div class="footer">
                    <?php date_default_timezone_set('America/El_Salvador');?>
                    <p>http://BIO-UES/reporteEspecimen/{{$fecha}} <?=date('g:ia');?></p>
    </div>
    </div>

        <script type="text/php">
            if (isset($pdf)) {
                $text = "Página {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = 250;
                $y = 10;;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>

    </body>

</html>