@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Listado de prestatarios</h2>
  </header>
@endsection
@section('container')
<div class="row"  >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left ">
            <h3 > Datos del prestamo</h3>
            <br>
        </div>
    </div>
</div>

<?php 
$idP = $prestamos->nombreColeccion;
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
 
    echo "<div>Identificador: #".$idP." ";
    echo "<div>Capital Inicial: ".number_format($deuda,2,",",".")." $";
    echo "<br>Tasa de interes: ".number_format($interest,0,",",".")." %";
    echo "<br>Duracion en años: ".number_format($anos,0,",",".")." ";
    echo "<br>Cuota a pagar mensualmente: ".number_format($m,2,".",",")." $</div>";
    ?>
    <table border="1" cellpadding="7" cellspacing="0">
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


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre : </strong>
            {{ $prestamos->nombreColeccion}}
        </div>
    </div>
</div>
            <br/>
            <a class="btn btn-primary" href="{{ route('prestamo.index') }}"> <i class="glyphicon glyphicon-arrow-left"> Regresar</i></a>
    </div>

@endsection
