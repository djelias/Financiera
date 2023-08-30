@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Especies</h2>
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
      @can('Crear Especie')
        <a id='btnAgregar' onclick="mostrarFormulario()" class="btn btn-success btn-lg">
            Nueva Especie
        </a>
        @endcan
        <br>
        <br>
              {{ Form::open(['route'=>'especie.store', 'method'=>'POST', 'class'=>'agregar']) }}
             @include('especie.form_master')
             {{ form::close() }}
        
      </div>
       <div class="col-md-4">
         {!! Form::open(['route'=>'especie.index', 'method'=>'GET', 'class'=>'navbar-form pull-right', 'role'=>'search'])!!}
        <div class="input-group"> 
           {!! Form::text('nombreEspecie', null, ['class'=>'form-control', 'placeholder'=>'Buscar'])!!}
           <button type="submit" class="btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar">Buscar</button>
        {!! Form::close()!!}
        </div>
        <br>
      
      </div>
  </div>
  <div class="row"> 
          <div>
              <br>
               {!! Form::open(['route'=>'especie.index', 'method'=>'GET'])!!}
              <div class="input-group col-md-12">
                <select name="idReino" id="idReino" class="form-control">
                <option disabled selected>Seleccione reino </option>
                @foreach($reinos as $reino)
                      <option value="{{$reino->id}}">{{$reino->nombreReino}}</option>
                       
                 @endforeach
           </select>
             <div class="col-md-3">
              <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar" id="buscar">Filtrar especies</button>
                 </div>
            <div class="col-md-3">
                {!! link_to_action('EspecieController@reportePDF','reporte pdf',[$idReino], $attributes = array('class' => 'btn btn-info btn-sm', 'target' =>'_blank')) !!}
            
            </div>
             
       
           
              </div>
              
              {!! Form::close()!!}
            </div> 
                   
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
      <th style="text-align:center">Especie</th>
      <th style="text-align:center">Acciones</th>
    </tr>
    <?php $no=1; ?>
      <?php $no=1; ?>
    @foreach ($especies as $key => $value).

    <tr>
        <td>{{$no++}}</td>
        <td>{{$value->Genero->Familia->Orden->Clase->Filum->Reino->Dominio->nombreDominio}}</td>
        <td>{{$value->Genero->Familia->Orden->Clase->Filum->Reino->nombreReino}}</td>
        <td>{{$value->Genero->Familia->Orden->Clase->Filum->nombreFilum}}</td>
        <td>{{$value->Genero->Familia->Orden->Clase->nombreClase}}</td>
        <td>{{$value->Genero->Familia->Orden->nombreOrden}}</td>
        <td>{{$value->Genero->Familia->nombreFamilia}}</td>
        <td>{{$value->Genero->nombreGenero }}</td>
        <td>{{$value->nombreEspecie }}<br></td>
        <td>
          <a class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Detalles" href="{{route('especie.show',$value->id)}}" target="_blank">
              <i class="glyphicon glyphicon-list-alt">Detalles PDF</i></a>
               
          @can('Editar Especie')
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{route('especie.edit',$value->id)}}">
              <i class="glyphicon glyphicon-pencil">Editar</i></a>
          @endcan
          @can('Eliminar Especie')
            {!! Form::open(['method' => 'DELETE','route' => ['especie.destroy', $value->id],'style'=>'display:inline', 'class'=>'formulario-eliminar']) !!}
              <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" >Eliminar</i></button>
            {!! Form::close() !!}
          @endcan
        </td>
      </tr>
    @endforeach
  </table>
  {!! $especies->appends(Request::only(['idReino'=>'idReino']))->render() !!} 
  
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>

<!--Script para mostrar formulario y Alerta confirmar Guardar con ajax-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
      $('.agregar2').hide();
       function mostrarFormulario2(){
        $('.agregar2').show();
       }
      $('.agregar').hide();
       function mostrarFormulario(){
        $('.agregar').show();
       }
$('.agregar').submit(function(e){
     e.preventDefault();Swal.fire({
  title: '¿Está seguro de guardar esta especie?',
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
    title: '¿Está seguro de eliminar permanentemente esta Especie?',
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