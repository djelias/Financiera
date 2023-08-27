<center><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EM Y ASOCIADOS, S.A. DE C.V.</h3></center>
<center><h3>LIBRO DE COMPRAS</h3></center>
<h4>AÑO:</h4>
<h4>NRC:</h4>
<br>
<?php 
$no = 1;
$snetot = 0;
$ivat = 0;
$montot = 0;
?>
<table border="1">
    <thead>
    <tr>
        <th rowspan="2">No.</th>
        <th rowspan="2">FECHA DE EMISION</th>
        <th rowspan="2">N° DE DOCUMENTO</th>
        <th rowspan="2">NIT PROVEEDOR</th>
        <th rowspan="2">NRC</th>
        <th rowspan="2">NIT O DUI DE SUJETO EXCLUIDO</th>
        <th rowspan="2">NOMBRE DE PROVEEDOR</th>
        <th rowspan="2">COMPRAS INTERNAS EXENTAS</th>
        <th colspan="3">COMPRAS GRAVAS</th>
        <th colspan="3">CONTRIBUCION ESPECIAL</th>
        <th rowspan="2">ANTICIPO A CUENTA IVA PERCIBIDO</th>
        <th rowspan="2">TOTAL COMPRAS</th>
        <th rowspan="2">RETENCION A TERCEROS</th>
        <th rowspan="2">COMPRAS A SUJETOS EXCLUIDOS</th>
    </tr>
    <tr>
        <th>INTERNAS</th>
        <th>IMPORTACIONES</th>
        <th>CREITO FISCAL</th>
        <th>FOVIAL</th>
        <th>COTRANS</th>
        <th>CESC</th>
    </tr>
    </thead>
    <tbody>
        @foreach($libcompras as $value)
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
            <td>{{ $value2->noRegistro }}</td>
            <td>{{ $value2->estatus }}</td>
            <td>{{ $value2->estatus2 }}</td>
            <td>{{ $value2->nombreContrib }}</td>
            <td></td>
            <td>$ {{ $value->sneto }}</td>
            <td></td>
            <td>$ {{ $value->iva }}</td>
            <td></td>
            <td></td>
            <td></td>
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
        <td colspan="7">Total</td>
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