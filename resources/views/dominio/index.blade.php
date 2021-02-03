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
  <div>
          {!! Form::open(['route'=>'dominio.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
          {!! Form::text('nombreDominio', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
            {!! Form::close()!!}
        </div>
      <div>
        <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nuevo Dominio
        </button>
      
        {{ Form::open(['route'=>'dominio.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('dominio.form_master')
             {{ form::close() }}
        
        
      </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($dominios as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->nombreDominio }}</td>
        <td>
          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('dominio.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt"></i></a>
          <a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('dominio.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil"></i></a>
            {!! Form::open(['method' => 'DELETE','route' => ['dominio.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </table>
  {!!$dominios->render()!!}
 <div class="text-center">
    <a class="btn btn-primary" href="#">Regresar</a>
  </div>

  <!--Script para mostrar campo para agregar nuevo Dominio-->
  <script type="text/javascript">
    $('.agregar').hide();
       function mostrarFormulario(){
        $('.agregar').show();
       }
  </script>
<!--Script para Alerta con ajax-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente este dominio?',
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

