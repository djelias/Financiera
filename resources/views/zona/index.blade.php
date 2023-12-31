@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Zonas</h2>
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
      @can('Crear Zona')
        <button id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nueva Zona
        </button>
        @endcan
        <br>
        <br>
      
         {{ Form::open(['route'=>'zona.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('zona.form_master')
             {{ form::close() }}
        
      </div>
   <div class="col-md-4">
         {!! Form::open(['route'=>'zona.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
           {!! Form::text('nombreZona', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
           <button type="submit" class="btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar">Buscar</button>
        {!! Form::close()!!}
        </div>
        <br>
      
      </div>    
  </div>
      <br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Nombre Zona</th>
      <th style="text-align:center">Lugar Zona</th>
      <th style="text-align:center">Municipio Zona</th>
     <!--  <th style="text-align:center">Departamento Zona</th>-->
      <th style="text-align:center">Latitud Zona</th>
      <th style="text-align:center">Longitud Zona</th>
     <!--  <th style="text-align:center">Habitat Zona</th>-->
     <!-- <th style="text-align:center">Descripcion de Zona</th> --> 
      <th style="text-align:center">Acciones</th>

      </tr>
    <?php $no=1; ?>
    @foreach ($zonas as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{ $value->nombreZona }}</td>
        <td>{{ $value->lugarZona }}</td>
        <td>{{ $value->Municipio->nombreMunicipio }}</td>
      <!--  <td>{{ $value->Municipio->Departamento->nombreDepto }}</td>-->
        <td>{{ $value->latitudZona }}</td>
        <td>{{ $value->longitudZona }}</td>
        <!--<td>{{ $value->habitatZona }}</td>-->
    <!--    <td>{{ $value->descripcionZona1 }}</td>-->
       <td>
                   <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('zona.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
          @can('Editar Zona')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('zona.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan
          @can('Eliminar Zona')
            {!! Form::open(['method' => 'DELETE','route' => ['zona.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" >Eliminar</i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>
    @endforeach
  </table>
  {!!$zonas->render()!!}
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
  title: '¿Está seguro de guardar esta Zona?',
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
    title: '¿Está seguro de eliminar permanentemente esta Zona?',
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
