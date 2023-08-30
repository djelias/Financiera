@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"><h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Gestion de partidas contables</h2>
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
     <div>
        <a href="{{route('partidac.create')}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> NUEVO</i>
        </a>
        <a href="{{route('reporteBalance')}}" class="btn btn-success btn-lg">
            <i class="glyphicon glyphicon-plus"> Balance</i>
        </a>
        {!! Form::open(['route'=>'partidac.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
        </div>
         <button type="submit" class="glyphicon glyphicon-search btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar"></button>
        {!! Form::close()!!}
      </div>
      <br>
      <div class="col-md-12" style="text-align:right;">
          <a href="partidacPrueba.pdf" class="btn-info btn-sm" target="_blank" >Generar PDF</a>
      </div>    
      <div class="col-md-12" style="text-align:right;">
          <a href="{{route('excelPartidac')}}" class="btn-info btn-sm" target="_blank" >Generar EXCEL</a>
      </div> 
  </div>
 
      <br>
 <table class="table table-striped" style="text-align:center" >
    <tr>
      <th style="text-align:center">Codigo</th>
      <th style="text-align:center">Correlativo</th>
      <th style="text-align:center">Descripcion</th>
      <th style="text-align:center">Parcial</th>
      <th style="text-align:center">Debe</th>
      <th style="text-align:center">Haber</th>
      <th style="text-align:center">Accion</th>
    </tr>
    <?php $no=1;
    $debet = 0;
    $habert = 0;
    $aux = 0;
    $cor = "0";
     ?>
    @foreach ($partidac as $key => $value)

    <tr>
        <td>{{ $value->idcatalogo }}</td>
        <td>{{ $value->correlativo }}</td>
        <td>{{ $value->descripcion }}</td>
        <td>{{ $value->saldo }}</td>
        <td>{{ $value->debe }}</td>
        <td>{{ $value->haber }}</td>
        <td>
          <a class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('partidac.show',$value->id)}}">
              <i class="glyphicon glyphicon-list-alt">Detalles</i></a>
          @can('Editar Dominio')
          <a class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('partidac.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan
          @can('Eliminar Dominio')
            {!! Form::open(['method' => 'DELETE','route' => ['partidac.destroy', $value->id],'style'=>'display:inline']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-lg" onclick="return confirm('¿Esta seguro de eliminar este Registro?')"><i class="glyphicon glyphicon-trash" >Eliminar</i></button>
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
  {!!$partidac->render()!!}
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
  title: '¿Está seguro de guardar esta partida?',
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
    title: '¿Está seguro de eliminar permanentemente esta partida?',
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
