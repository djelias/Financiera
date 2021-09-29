@extends ('layout')
@section('header')
<header style="background-image: url('startbootstrap-clean-blog-gh-pages/assets/img/titulos.jpg'); opacity: 0.8;"><h2 style="color: white; font-family: sans-serif; font-size: 58px; text-align: center;">Gestion de Roles</h2>
  </header>
@endsection
@section('container')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
          </div>
        <div class="pull-right">
        @can('Crear Rol')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Nuevo Rol de Usuario</a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<br>
<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Nombre</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Detalle</a>
            @can('Editar Rol')
                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Editar</a>
            @endcan
            @can('Eliminar Rol')
                {!! Form::open(['method' => 'Eliminar','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}
 <div class="text-center">
    <a class="btn btn-primary" href="{{ url('/gestion') }}">Regresar</a>
  </div>
@endsection