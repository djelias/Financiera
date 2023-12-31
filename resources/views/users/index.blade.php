@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"><h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Gestion de Usuarios</h2>
  </header>
@endsection
@section('container')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manejo de Usuarios</h2>
        </div>
        <div class="pull-right">
        @can('Crear Usuarios')
            <a class="btn btn-success" href="{{ route('users.create') }}"> Crear Usuario</a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Nombre</th>
   <th>Correo</th>
   <th>Roles</th>
   <th width="340px">Acciones</th>
 </tr>
 <<?php 
$i=0;
  ?>
 @foreach ($users as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Detalle</a>
       @can('Editar Usuarios')
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
       @endcan
       @can('Eliminar Usuarios')
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
       @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $users->render() !!}
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
@endsection