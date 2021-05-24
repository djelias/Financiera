@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Dominios</h2>
      <br>
      </div>
    </div>
  </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th style="text-align:center">Id Bold</th>
      <th style="text-align:center">Filum</th>
      <th style="text-align:center">Clase</th>
      <th style="text-align:center">Orden</th>
      <th style="text-align:center">Familia</th>
      <th style="text-align:center">Genero</th>
      <th style="text-align:center">Especie</th>
      <th style="text-align:center">Pais</th>
    </tr>
    <?php
    var_dump($otra);
    //$src = $response->bold_records->records;
    //$seq = $response->bold_records->records;
    ?> 
    
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="#">Regresar</a>
 </div>
@endsection