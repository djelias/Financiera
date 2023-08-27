   <br>
   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Nombres del prestatario:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('pnombre') ? 'has-error' : "" }}">
       <i>{{ Form::text('pnombre',NULL, ['class'=>'form-control','id'=>'pnombre','placeholder'=>'Nombre']) }} </i>
    </div>
  </div>

    <div class="col-sm-5">
      {!! form::label('Apellidos del prestatario:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('papellido') ? 'has-error' : "" }}">
       <i>{{ Form::text('papellido',NULL, ['class'=>'form-control','id'=>'papellido','placeholder'=>'Apellidos']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Numero de DUI:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('dui') ? 'has-error' : "" }}">
       <i>{{ Form::text('dui',NULL, ['class'=>'form-control','id'=>'dui','placeholder'=>'########-#']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Correo electronico:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('email') ? 'has-error' : "" }}">
       <i>{{ Form::text('email',NULL, ['class'=>'form-control','id'=>'email','placeholder'=>'Correo']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Numero de telefono:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('tel') ? 'has-error' : "" }}">
       <i>{{ Form::text('tel',NULL, ['class'=>'form-control','id'=>'tel','placeholder'=>'Numero telefonico']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Direccion:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('direccion') ? 'has-error' : "" }}">
       <i>{{ Form::text('direccion',NULL, ['class'=>'form-control','id'=>'direccion','placeholder'=>'Direccion']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Direccion 2:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('direccion2') ? 'has-error' : "" }}">
       <i>{{ Form::text('direccion2',NULL, ['class'=>'form-control','id'=>'direccion2','placeholder'=>'Direccion 2']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Ciudad:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : "" }}">
       <i>{{ Form::text('ciudad',NULL, ['class'=>'form-control','id'=>'ciudad','placeholder'=>'Ciudad']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Municipio:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('municipio') ? 'has-error' : "" }}">
       <i>{{ Form::text('municipio',NULL, ['class'=>'form-control','id'=>'municipio','placeholder'=>'Municipio']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Codigo zip:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('zip') ? 'has-error' : "" }}">
       <i>{{ Form::text('zip',NULL, ['class'=>'form-control','id'=>'zip','placeholder'=>'zip']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Pais:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('pais') ? 'has-error' : "" }}">
       <i>{{ Form::text('pais',NULL, ['class'=>'form-control','id'=>'pais','placeholder'=>'Pais']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Comentario:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('comentario') ? 'has-error' : "" }}">
       <i>{{ Form::text('comentario',NULL, ['class'=>'form-control','id'=>'comentario','placeholder'=>'Comentario']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Cuenta:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('cuenta') ? 'has-error' : "" }}">
       <i>{{ Form::text('cuenta',NULL, ['class'=>'form-control','id'=>'cuenta','placeholder'=>'Cuenta']) }} </i>
    </div>
  </div>

       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
      <a class="btn btn-danger btn-sm" href="{{ route('coleccion.index') }}">Cancelar</a>
    </div>
      </div>
 
   <br>

    <!--Script para Colocar guion automatico en numero de DUI-->
