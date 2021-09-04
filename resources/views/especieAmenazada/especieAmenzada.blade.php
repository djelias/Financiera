<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link href="{{ public_path()}}/css/reportes.css" rel="stylesheet">


<head>

	<title>especieAmenazada.pdf</title>

</head>

<body>

<div class="container-fluid">
	<div class="header">
								<h5>Fecha: {{$fecha}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<br>
								<h5>Reporte de Especies Amenzadas</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
	<div style="text-align: center;">
		<img src="{{ public_path('img/ues.jpg')}}" width="50" height="60" >
							</div>							
							<div>	
								
								<h4 style="text-align: center;">UNIVERSIDAD DE EL SALVADOR</h4>
								<h5 style="text-align: center;">ESCUELA DE BIOLOGIA</h5>
							</div>
	<div>
		<h4>Especies Amenazadas</h4>
	</div>

	<table class="table table-striped" style="text-align:center" >
    	<tr>
      		<th with="40px">No</th>
      		<th style="text-align:center">Nombre</th>
      		<th style="text-align:center">Nombre común</th>
      		<th style="text-align:center">Riesgo</th>
   		 </tr>
    <?php $no=1; ?>
    @foreach ($especieAmenazadas as $key => $value)
    	<tr>
        	<td>{{$no++}}</td>
        	<td style="text-align: center;">{{ $value->nomEspamen }}</td>
        	<td style="text-align: center;">{{ $value->nomComEspamen }}</td>
        	<td style="text-align: center;">{{ $value->Riesgo->catRiesgo }}</td>
      	</tr>
    @endforeach
  	</table>
  	<div class="footer">
					<?php date_default_timezone_set('America/El_Salvador');?>
					<p>http://BIO-UES/reporteEspeciesAmenazadas/{{$fecha}} <?=date('g:ia');?></p>
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