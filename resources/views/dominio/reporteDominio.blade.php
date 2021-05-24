<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Permisos</title>
	<!-- Bootstrap Core CSS -->
	<link href="{{ public_path()}}/css/reportes.css" rel="stylesheet">
	

	<body>
		<div class="container-fluid">
			<!--Contenido -->
			<div class="col-lg-12">
				<div class="row-fluid">
					<div class="container-fluid">
						<div class="row-fluid">
						
							<div align="center">
								<img src="{{URL::asset('/img/ues.svg')}}" class="grande">
							</div>							
							<div class="encabezado" id="encabezado">	
								
								<h4 style="font-weight: bold;">BIODIVERSIDAD EN EL SALVADOR</h4>
								<h4 style="font-weight: bold;">ESCUELA DE BIOLOGIA DE LA UES</h4>
							</div>
						</div>
					</div>
					<br>
					 
					<div class="panel-heading">
						<h3>Reporte de Dominios</h3>
					</div>

					<div></div>

					<!-- /.panel-heading -->
					<table class="table table-striped" >
						<tr>
							<th style="text-align:center">No</th>
							<th style="text-align:center">Nombre de Dominio/th>
							<th style="text-align:center">Total</th>
						</tr>
						 <?php $no=1; ?>
    					@foreach ($dominios as $key => $value)
    					<tr>
        					<td>{{$no++}}</td>
       						 <td>{{ $value->nombreDominio }}</td>
						</tr>
						@endforeach
						
					</table>
					
				</div>
				<!-- /.table-responsive -->
				<div class="footer">
					<?php date_default_timezone_set('America/El_Salvador');?>
					<p>http://BIO-UES/Escuela de Biología UES/reporteDominios/ <?=date('d-m-Y g:ia');?></p>
				</div>
			</div>              
			<!-- Fin Contenido-->
		</div>
		<script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 10;
        $text = "Pagina {PAGE_NUM} de {PAGE_COUNT}";
        $font = null;
        $size = 10;
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $word_space, $char_space, $angle);
    }
</script>
	</body>
	<style type="text/css">
		img.grande{
			width: 110px; height: 110px;
			border: 0;
		}
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			font-size: 12px;
		}
	</style>
	</html>