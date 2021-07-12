@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Coleccion</h2>
      <br>
      </div>
    </div>
  </div>
      <div>
        @can('Crear Colecciones')
        <a href="{{route('coleccion.create')}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> Nueva Coleccion</i>
        </a>
        @endcan
        {!! Form::open(['route'=>'coleccion.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombreColeccion', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
            {!! Form::close()!!}
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($colecciones as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->nombreColeccion }}</td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('coleccion.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>

          @can('Editar Colecciones')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('coleccion.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan

          @can('Eliminar Colecciones')
            {!! Form::open(['method' => 'DELETE','route' => ['coleccion.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm">Eliminar<i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>
    @endforeach
  </table>
  {!!$colecciones->render()!!}
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente esta colección?',
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

