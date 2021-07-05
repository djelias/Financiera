@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Secuencia</h2>
      <br>
      </div>
    </div>
  </div>
   
  @if ($errors->any())
   <div class="alert alert-danger">
  
          <p>Debe ingresar datos válidos</p>
     
   </div>
  @endif
 
      <div>
        @can('Crear Secuencia')
        <a href="{{route('secuencia.create')}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> NUEVO</i>
        </a>
        @endcan
        {!! Form::open(['route'=>'secuencia.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('secuenciaObtenida', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
            {!! Form::close()!!}
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Secuencia Obtenida</th>
      <th style="text-align:center">Método Secuenciación</th>
      <th style="text-align:center">Lugar</th>
      <th style="text-align:center">Hora</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Responsable</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($secuencias as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->secuenciaObtenida }}</td>
        <td>{{ $value->metodoSecuenciacion }}</td>
        <td>{{ $value->lugarSec }}</td>
        <td>{{ $value->horaSec }}</td>
        <td>{{ $value->fechaSec }}</td>
        <td>{{ $value->responsableSec }}</td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('secuencia.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
              @can('Editar Secuencia')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('secuencia.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
               @endcan

              @can('Eliminar Secuencia')
            {!! Form::open(['method' => 'DELETE','route' => ['secuencia.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm" onclick="return confirm('¿Esta seguro de eliminar este Registro?')"><i class="glyphicon glyphicon-trash" >Eliminar</i></button>
            {!! Form::close() !!}
            @endcan
        </td>
      </tr>
    @endforeach
  </table>
  {!!$secuencias->render()!!}
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente esta Secuencia?',
    /*text: "You won't be able to revert this!",*/
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Eliminar',
    cancelButtonText: 'Cancelar'

  }).then((result) => {
    if (result.isConfirmed) {
     this.submit();
    }
})
});

    </script>
@endsection


  