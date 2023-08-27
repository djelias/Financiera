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
                                <h5>Reporte de especimen: {{ $prestamos->codigoPrestamo}}</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
    <div style="text-align: center;">
        <img src="{{ public_path('img/ues.jpg')}}" width="50" height="60" >
                            </div>                          
                            <div>   
                                
                                <h4 style="text-align: center;">UNIVERSIDAD DE EL SALVADOR</h4>
                                <h5 style="text-align: center;">ESCUELA DE BIOLOGIA</h5>
                            </div>
    <div>
        <h4>Especimen: {{ $prestamos->codigoPrestamo}}</h4>
    </div>

    <table class="table table-bordered" style="text-align:center" >
        <tr>
            <th style="text-align:center">Especie</th>
            <td style="text-align: center;">{{ $prestamos->idpres}}</td>
        </tr>
        <tr>
            <th style="text-align:center">Cantidad de muestras</th>
            <td style="text-align: center;">{{ $prestamos->periodicidad}}</td>
        </tr>
        <tr>    
            <th style="text-align:center">Caracteristicas</th>
            <td style="text-align: center;">{{ $prestamos->tasa}}</td>
        </tr>
        <tr>
            <th style="text-align:center">Colector</th>
            <td style="text-align: center;">{{ $prestamos->cantidad}}</td>
        </tr>
        
         </tr>
        
    </table>
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