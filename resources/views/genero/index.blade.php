@extends ('layouts.app')
@section('content')
  <div class="row">
    <div class ="col-sm-12">
      <div class="full.right">
      <h2>Genero</h2>
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
        {!! Form::open(['route'=>'genero.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombreGenero', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
        {!! Form::close()!!}
      </div>
      <div>
        <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nuevo Genero
        </button>
        <br>
        <br>
              {{ Form::open(['route'=>'genero.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('genero.form_master')
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
      <th style="text-align:center">Genero</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($generos as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$value->Familia->Orden->Clase->Filum->Reino->Dominio->nombreDominio}}</td>
        <td>{{$value->Familia->Orden->Clase->Filum->Reino->nombreReino}}</td>
        <td>{{$value->Familia->Orden->Clase->Filum->nombreFilum}}</td>
        <td>{{$value->Familia->Orden->Clase->nombreClase}}</td>
        <td>{{$value->Familia->Orden->nombreOrden}}</td>
        <td>{{$value->Familia->nombreFamilia}}</td>
        <td>{{$value->nombreGenero }}<br></td>
        <td>
          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('genero.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt"></i></a>
          <a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('genero.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['genero.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!!$generos->render()!!}
 <div class="text-center">
    <a class="btn btn-primary" href="#">Regresar</a>
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
  title: '¿Está seguro de guardar este Genero?',
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
    title: '¿Está seguro de eliminar permanentemente este Genero?',
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