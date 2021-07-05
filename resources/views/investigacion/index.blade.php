@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Investigaciones</h2>
  </header>
@endsection
@section('container')
 
  @if ($errors->any())
   <div class="alert alert-danger">
  
          <p>Debe ingresar datos válidos</p>
     
   </div>
  @endif
  <br>
   <div class="row">
     <div class="col-md-8">
      @can('Crear Investigacion')
        <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nueva Investigacion
        </button>
        @endcan
        <br>
        <br>
      
         {{ Form::open(['route'=>'investigacion.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('investigacion.form_master')
             {{ form::close() }}
        
      </div>
    <div class="col-md-4">        {!! Form::open(['route'=>'investigacion.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombreInv', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
            {!! Form::close()!!}
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
     <th with="80px">No</th>
     <!-- <th style="text-align:center">Zona</th>-->
      
      <th style="text-align:center">Fecha de ingreso</th>
      <th style="text-align:center">Investigacion</th>
      <th style="text-align:center">Lugar de Investigacion</th>
     <!-- <th style="text-align:center">Responsable de Investigacion</th>
      <th style="text-align:center">Objetivo de Investigacion</th>
      <th style="text-align:center">Contacto</th>
      <th style="text-align:center">Unidad Encargada</th>
      <th style="text-align:center">Otras Instituciones</th>
      <th style="text-align:center">Documentacion</th>--> 
      <th style="text-align:center">Descripcion de Investigacion</th>
    <!--  <th style="text-align:center">Correo Electronico</th>--> 
    
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($investigaciones as $key => $value)
    <tr>
        <td>{{$no++}}</td>
       
        
        <td>{{$value->fechaIngreso }}<br></td>
        <td>{{$value->nombreInv }}<br></td><br>
        <td>{{$value->lugarInv }}<br></td>
       <!-- <td>{{$value->responsableInv }}<br></td>
        <td>{{$value->objetivo}}<br></td>
        <td>{{$value->contacto }}<br></td>
        <td>{{$value->unidadEncargada }}<br></td>
        <td>{{$value->otrasInstit }}<br></td>
        <td>{{$value->documentacion }}<br></td>-->
        <td>{{$value->descripcionInvestigacion }}<br></td>
      <!--  <td>{{$value->correoElectronico }}<br></td>
      -->
         <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('investigacion.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
          @can('Editar Investigacion')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('investigacion.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan
          @can('Eliminar Investigacion')
            {!! Form::open(['method' => 'DELETE','route' => ['investigacion.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" >Eliminar</i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>
    @endforeach
  </table>

  {!!$investigaciones->render()!!}

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
  title: '¿Está seguro de guardar esta Investigacion?',
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

  
<!--Script para Alerta confirmar eliminar con ajax-->

 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente esta Investigacion?',
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