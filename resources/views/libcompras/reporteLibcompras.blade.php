<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link href="{{ public_path()}}/css/reportesHorizontal.css" rel="stylesheet">


<head>

	<title>libcompras.pdf</title>

</head>

<body>

<div class="container-fluid">
	<div class="header">
								<h5>Fecha: {{$fecha}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<br>
								<h5>Reporte de compras</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
	<div style="text-align: center;">
		<img src="{{ public_path('img/logo.jpg')}}" width="50" height="60" >
							</div>							
							<div>	
								
								<h4 style="text-align: center;">EM & ASOCIADOS</h4>
							</div>
	<div>
		<h4>Reporte de libro de compras</h4>
		
	</div>
<?php 
$no = 1;
$snetot = 0;
$ivat = 0;
$montot = 0;
?>
	<table class="table table-striped" style="text-align:center" border="1">
    	<tr>
      		<th rowspan="2">No.</th>
        <th rowspan="2">FECHA DE EMISION</th>
        <th rowspan="2">N° DE DOCUMENTO</th>
        <th rowspan="2">NIT PROVEEDOR</th>
        <th rowspan="2">NOMBRE DE PROVEEDOR</th>
        <th rowspan="2">COMPRAS INTERNAS EXENTAS</th>
        <th colspan="3">COMPRAS GRAVAS</th>
        <th rowspan="2">ANTICIPO A CUENTA IVA PERCIBIDO</th>
        <th rowspan="2">TOTAL COMPRAS</th>
        <th rowspan="2">RETENCION A TERCEROS</th>
        <th rowspan="2">COMPRAS A SUJETOS EXCLUIDOS</th>
    </tr>
    <tr>
        <th>INTERNAS</th>
        <th>IMPORTACIONES</th>
        <th>CREITO FISCAL</th>
    </tr>
    </thead>
    <tbody>
        @foreach($libcompras2 as $value)
        @foreach($contribuyentes as $value2)
        @if($value->idContribuyente==$value2->nombreContrib)
        <?php 
            $snetot = $snetot + $value->sneto;
            $ivat = $ivat + $value->iva;
            $montot = $montot + $value->montoGravado;
         ?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ $value2->noIdentif }}</td>
            <td>{{ $value2->estatus2 }}</td>
            <td>{{ $value2->nombreContrib }}</td>
            <td></td>
            <td>$ {{ $value->sneto }}</td>
            <td></td>
            <td>$ {{ $value->iva }}</td>
            <td></td>
            <td>$ {{ $value->montoGravado }}</td>
            <td></td>
            <td></td>
        </tr>
        @endif
        @endforeach
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4">Total</td>
        <td></td>
        <td>$ {{$snetot}}</td>
        <td></td>
        <td>$ {{$ivat}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>$ {{$montot}}</td>
        <td></td>
        <td></td>
    </tr>
    </tfoot>
  	</table>
  	<div class="footer">
					<?php date_default_timezone_set('America/El_Salvador');?>
					<p>http://BIO-UES/reporteDominios/{{$fecha}} <?=date('g:ia');?></p>
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