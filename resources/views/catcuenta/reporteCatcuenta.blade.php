<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link href="{{ public_path()}}/css/reportes.css" rel="stylesheet">


<head>

	<title>catcuenta.pdf</title>

</head>

<body>

<div class="container-fluid">
	<div class="header">
								<h5>Fecha: {{$fecha}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<br>
								<h5>Reporte de cuentas</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>

	<table class="table table-striped tamletra" style="text-align:center" >
    	<tr>
      		<th with="10%">No</th>
      		<th with="10%" style="text-align:center">Cuenta</th>
      		<th with="10%" style="text-align:center">Subcuenta</th>
      		<th style="text-align:center">Cuenta detalle</th>
      		<th style="text-align:center">Descripcion</th>
   		 </tr>
    <?php $no=1; ?>
    @foreach ($catcuentas as $key => $value)
    	<tr>
        	<td>{{$no++}}</td>
        	<td style="text-align: center;">{{ $value->cuenta }}</td>
        	<td style="text-align: center;">{{ $value->subcuenta }}</td>
        	<td style="text-align: center;">{{ $value->cuentaDetalle }}</td>
        	<td style="text-align: left;">{{ $value->rubroDesc }}</td>
      	</tr>
    @endforeach
  	</table>

    <div class="footer">
    <h3>F. __________________</h3>
    <h3>Nombre firma</h3>
  </div>
	</div>

  


	</body>

</html>