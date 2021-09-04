<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link href="{{ public_path()}}/css/reportes.css" rel="stylesheet">


<head>

	<title>especies.pdf</title>

</head>

<body>

<div class="container-fluid">
	<div class="header">
								<h5>Fecha: {{$fecha}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<br>
								<h5>Reporte de especie: {{ $especies->nombreEspecie}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
	<div style="text-align: center;">
		<img src="{{ public_path('img/ues.jpg')}}" width="50" height="60" >
							</div>							
							<div>	
								
								<h4 style="text-align: center;">UNIVERSIDAD DE EL SALVADOR</h4>
								<h5 style="text-align: center;">ESCUELA DE BIOLOGIA</h5>
							</div>
	<div>
		<h4>Datos de especie: {{ $especies->nombreEspecie}}</h4>
	</div>

	<table class="table table-bordered" style="text-align:center" >
    	<tr>
      		<th style="text-align:center">Dominio</th>
      		<td style="text-align: center;">{{ $especies->Genero->Familia->Orden->Clase->Filum->Reino->Dominio->nombreDominio}}</td>
      	</tr>
      	<tr>
      		<th style="text-align:center">Reino</th>
      		<td style="text-align: center;">{{$especies->Genero->Familia->Orden->Clase->Filum->Reino->nombreReino}}</td>
      	</tr>
      	<tr>	
      		<th style="text-align:center">Filum</th>
      		<td style="text-align: center;">{{ $especies->Genero->Familia->Orden->Clase->Filum->nombreFilum}}</td>
      	</tr>
      	<tr>
      		<th style="text-align:center">Clase</th>
      		<td style="text-align: center;">{{ $especies->Genero->Familia->Orden->Clase->nombreClase}}</td>
      	</tr>
      	<tr>
      		<th style="text-align:center">Orden</th>
      		<td style="text-align: center;">{{ $especies->Genero->Familia->Orden->nombreOrden}}</td>
      	</tr>	
      	<tr>
      		<th style="text-align:center">Familia</th>
      		<td style="text-align: center;"> {{ $especies->Genero->Familia->nombreFamilia}}</td>
      	</tr>	
      	<tr>
      		<th style="text-align:center">Genero</th>
      		<td style="text-align: center;">{{ $especies->Genero->nombreGenero}}</td>
      	</tr>	
      		
   		 </tr>
    	
  	</table>
  	<div class="footer">
					<?php date_default_timezone_set('America/El_Salvador');?>
					<p>http://BIO-UES/reporteEspecie/{{$fecha}} <?=date('g:ia');?></p>
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