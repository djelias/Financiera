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
      <th style="text-align:center">Numero</th>
      <th style="text-align:center">Id Bold</th>
      <th style="text-align:center">Institucion de almacenamiento</th>
      <th style="text-align:center">Familia</th>
      <th style="text-align:center">Especie</th>
      <th style="text-align:center">Referencia</th>
      <th style="text-align:center">Pais</th>
      <th style="text-align:center">Secuencia</th>
      <th style="text-align:center">Pais</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($src as $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->record_id }}</td>
        <td>{{ $value->specimen_identifiers->institution_storing }}</td>
        <td>{{ $value->taxonomy->family->taxon->name }}</td>
        <td>{{ $value->taxonomy->species->taxon->name }}</td>
        <td>{{ $value->taxonomy->species->taxon->reference }}</td>
        <td>{{ $value->collection_event->country }}</td>
        <td>{{ $value->sequences->sequence->0->nucleotides }}</td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('coleccion.show',$value->record_id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
        </td>
      </tr>
    @endforeach
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="#">Regresar</a>
 </div>
@endsection