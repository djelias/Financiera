@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"> <h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Bitacora</h2>
  </header>
@endsection
@section('container')

      
<br>
  <table class="table table-striped" style="text-align:center" >
    <tr>
      <th with="80px">No</th>
      <th style="text-align:center">Descripcion</th>
      <th style="text-align:center">Registro</th>
      <th style="text-align:center">Id registro</th>
      <th style="text-align:center">Registro modificado</th>
       <th style="text-align:center">Usuario</th>
       <th style="text-align:center">Fecha Modificacion</th>
    </tr>
    <?php $no=1; ?>
    @foreach ($activity as $key => $value)
    <tr>
        <td>{{$no++}}</td>
        @if($value->description=='created')
        <td>{{"Creado"}}</td>
        @elseif($value->description=='updated')
        <td>{{"Actualizado"}}</td>
        @elseif($value->description=='deleted')
        <td>{{"Eliminado"}}</td>
        @endif

        <?php 
          $tabla1=$value->subject_type;
          $tabla=substr($tabla1, 4)
         ?>
         
        <td>{{$tabla}}</td>
        <td>{{$value->subject_id}}</td>
        <td>{{$value->registroModificado}}</td>
    @foreach ($users as $user)
      @if($user->id == $value->causer_id)
        <td>{{$user->name }}<br></td>
      @endif
    @endforeach
        <td>{{$value->updated_at }}<br></td>

      </tr>
    @endforeach
  </table>
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
    
@endsection