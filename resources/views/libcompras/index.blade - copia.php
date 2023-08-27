@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"><h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Libro de compras</h2>
  </header>
@endsection
@section('container')
 <br>
  @if ($errors->any())
   <div class="alert alert-danger">
  
          <p>Debe ingresar datos válidos</p>
     
   </div>
  @endif
  <div class="row">
     <div class="col-md-8">
        @can('Crear Dominio')
        <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nueva Cuenta
        </button>
        @endcan
      
        {{ Form::open(['route'=>'libcompras.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('libcompras.form_master')
             {{ form::close() }}
        
      </div>
      
    <div class="col-md-4">
        {!! Form::open(['route'=>'libcompras.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('cuenta', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
           <button type="submit" class="btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar">Buscar</button>
        {!! Form::close()!!}
        </div>
        <br>
      
      </div>
      <div class="col-md-12" style="text-align:right;">
          <a href="libcomprasPrueba.pdf" class="btn-info btn-sm" target="_blank" >Generar PDF</a>
      </div>    
  </div>
 
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
     <th style="text-align:center">Tipo de documento</th>
      <th style="text-align:center">CCF</th>
      <th style="text-align:center">Periodo mes</th>
      <th style="text-align:center">Periodo año</th>
      <th style="text-align:center">Fecha</th>
      <th style="text-align:center">Contribuyente</th>
      <th style="text-align:center">Acciones</th>
    </tr>
        <?php $no=1;
    $debet = 0;
    $habert = 0;
    $aux = 0;
    $cor = "0";
     ?>
    @foreach ($libcompra as $key => $value)

    <tr>
        <td>{{ $value->tipoDoc }}</td>
        <td>{{ $value->ccf }}</td>
        <td>{{ $value->mes }}</td>
        <td>{{ $value->año }}</td>
        <td>{{ $value->fechaccf }}</td>
        <td>{{ $value->idContribuyente }}</td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('libcompras.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
          @can('Editar Dominio')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('libcompras.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan
          @can('Eliminar Dominio')
            {!! Form::open(['method' => 'DELETE','route' => ['libcompras.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" >Eliminar</i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>

      @if($aux==7)
       <tr>
        <td>Total:</td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{$debet}}</td>
        <td>{{$habert}}</td>
        <td></td>
       </tr>
       <?php 
        $debet = 0;
        $habert = 0;
        $aux = 0;
        $cor = "0";
        $cor2 = "0";
       ?>
       @endif

    @endforeach
  </table>
  {!!$libcompra->render()!!}
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
  title: '¿Está seguro de guardar esta compra?',
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
<!--Script para Alerta con ajax-->

 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente esta compra?',
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
