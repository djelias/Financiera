@extends ('layout')
@section('header')

<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Especímenes</h2>
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
        @can('Especimenes')
        <a href="{{route('especimen.create')}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> NUEVO</i>
        </a>
        @endcan
        </div>
        <div class="col-md-4">
         {!! Form::open(['route'=>'especimen.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
           {!! Form::text('codigoEspecimen', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
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
      <th style="text-align:center">Código de Especímen</th>
      <th style="text-align:center">Investigación</th>
      <th style="text-align:center">Colector</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($especimens as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$value->codigoEspecimen}}</td>
        <td>{{$value->Investigacion->nombreInv}}</td>
        <td>{{$value->colector }}<br></td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('especimen.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
          <i>{!! link_to_action('EspecimenController@generatePDF','Reporte PDF',[$value->id], $attributes = array('class' => 'btn btn-success btn-sm', 'target' =>'_blank')) !!} </i>
          @can('Editar Especimen')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('especimen.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan
          @can('Eliminar Especimen')
            {!! Form::open(['method' => 'DELETE','route' => ['especimen.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm">Eliminar<i class="glyphicon glyphicon-trash" ></i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>
    @endforeach
  </table>
  {!! $especimens->render() !!} 
  
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
  
<!--Script para Alerta confirmar eliminar con ajax-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script type="text/javascript">
$('.formulario-eliminar').submit(function(e){
     e.preventDefault();
       Swal.fire({
    title: '¿Está seguro de eliminar permanentemente este especímen?',
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