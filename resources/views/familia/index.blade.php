@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Familia</h2>
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
        {!! Form::open(['route'=>'familia.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombreFamilia', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
        {!! Form::close()!!}
      </div>
      <div>
        <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nueva Familia
        </button>
        <br>
        <br>
              {{ Form::open(['route'=>'familia.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('familia.form_master')
             {{ form::close() }}
        
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Dominio</th>
      <th style="text-align:center">Reino</th>
      <th style="text-align:center">Filum</th>
      <th style="text-align:center">Clase</th>
      <th style="text-align:center">Orden</th>
      <th style="text-align:center">Familia</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($familias as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$value->Orden->Clase->Filum->Reino->Dominio->nombreDominio}}</td>
        <td>{{$value->Orden->Clase->Filum->Reino->nombreReino}}</td>
        <td>{{$value->Orden->Clase->Filum->nombreFilum}}</td>
        <td>{{$value->Orden->Clase->nombreClase}}</td>
        <td>{{$value->Orden->nombreOrden}}</td>
        <td>{{$value->nombreFamilia }}<br></td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('familia.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('familia.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['familia.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm">Eliminar<i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!!$familias->render()!!}
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
  title: '¿Está seguro de guardar esta Familia?',
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
    title: '¿Está seguro de eliminar permanentemente esta Familia?',
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