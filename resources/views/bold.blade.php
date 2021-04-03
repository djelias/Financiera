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
      <th with="80px">No</th>
      <th style="text-align:center">Nombre</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php
    //var_dump($response);
    $src = $response->bold_records->records;
    $seq = $response->bold_records->records;
    ?> 
    @foreach ($src as $value)
    <?php
    //$seq = $response->bold_records->records->sequences->sequence;
    //var_dump($seq);
    ?>    
        <tr>
        <td>{{ $value->record_id }}</td>
        <td>{{ $value->specimen_identifiers->institution_storing }}</td>
        <td>{{ $value->taxonomy->phylum->taxon->name }}</td>
      </tr>
    @endforeach
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="#">Regresar</a>
 </div>
@endsection