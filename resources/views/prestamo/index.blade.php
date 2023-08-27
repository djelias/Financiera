@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Listado de prestamos</h2>
  </header>
@endsection
@section('container')
 <br>
      <div class="row">
        <div class="col-md-8">
           @can('Crear Dominio')
         <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nuevo Prestamo
        </button>
        @endcan
         {{ Form::open(['route'=>'prestamo.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('prestamo.form_master')
             {{ form::close() }}
      </div>
         <div class="col-md-4">
        {!! Form::open(['route'=>'prestamo.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('codigoPrestamo', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
           <button type="submit" class="btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar">Buscar</button>
        {!! Form::close()!!}
        </div>
        <br>
      
      </div>
        </div>
       
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Prestamo</th>
      <th style="text-align:center">Prestatario</th>
      <th style="text-align:center">Descripcion</th>
      <th style="text-align:center">Cantidad</th>
      <th style="text-align:center">Balance</th>
      <th style="text-align:center">Cliente</th>
      <th style="text-align:center">Fecha de pago</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($prestamos as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->codigoPrestamo }}</td>
        @foreach ($prestatarios as $key => $value2)
          @if($value->idprest == $value2->id)
        <td>{{ $value2->pnombre }} {{ $value2->snombre }} {{ $value2->papellido }}</td>
        @endif
        @endforeach
        <td>{{ $value->descrip }}</td>
        <td>{{ $value->cantidad }}</td>
        <td>{{ 0 }}</td>
        <td>{{ $value->idprest }}</td>
        <td>{{ $value->fechadePago }}</td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('reportePre',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Reporte</i></a>

          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('prestamo.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>

          @can('Editar Dominio')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('prestamo.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan


          @can('Eliminar Dominio')
            {!! Form::open(['method' => 'DELETE','route' => ['prestamo.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm">Eliminar<i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>
    @endforeach
  </table>
  {!!$prestamos->render()!!}
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

    <!--Script para mostrar formulario y Alerta confirmar Guardar con ajax-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
      $('.agregar').hide();
       function mostrarFormulario(){
        $('.agregar').show();
       }
$('.agregar').submit(function(e){
     e.preventDefault();Swal.fire({
  title: '¿Está seguro de guardar esta Prestamo?',
  showDenyButton: true,
  //showCancelButton: true,
  confirmButtonText: `Guardar`,
  denyButtonText: `Cancelar`,
})
     .then((result) => {
    if (result.isConfirmed) {
     this.submit();
    }
})
});
</script>

 <script type="text/javascript">
      $('.agregar').hide();
       function mostrarFormulario(){
        $('.agregar').show();
       }
$('.agregar').submit(function(e){
     e.preventDefault();Swal.fire({
  title: '¿Está seguro de guardar esta Prestamo?',
  showDenyButton: true,
  //showCancelButton: true,
  confirmButtonText: `Guardar`,
  denyButtonText: `Cancelar`,
})
     .then((result) => {
    if (result.isConfirmed) {
     this.submit();
    }
})
});
</script>
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

