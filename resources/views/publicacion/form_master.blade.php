   <div class="row">
    <div class="col-sm-5">
      <br>
      {!! form::label('Ingrese el Nombre de la publicacion:') !!}
      <div class="form-horizontal {{ $errors->has('nombrePublicacion') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombrePublicacion',NULL, ['class'=>'form-control','id'=>'nombrePublicacion','placeholder'=>'Nombre de publicacion']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombrePublicacion', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="col-sm-5">

      <br>
      {!! form::label('Ingrese la Descripcion:') !!}
      <div class="form-horizontal {{ $errors->has('descripcionPub') ? 'has-error' : "" }}">
            <i> {{ Form::text('descripcionPub',NULL, ['class'=>'form-control','id'=>'descripcionPub','placeholder'=>'Descripcion de publicacion']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombrePublicacion', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="col-sm-5">
    <br>
      {!! form::label('Ingrese el Enlace:') !!}
      <div class="form-horizontal {{ $errors->has('url') ? 'has-error' : "" }}">
            <i> {{ Form::text('url',NULL, ['class'=>'form-control','id'=>'url','placeholder'=>'Enlace de la publicacion']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('url', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="col-sm-5">
    <br>
      {!! form::label('Ingrese la Fecha inicio:') !!}
      <div class="form-horizontal {{ $errors->has('fechaInicio') ? 'has-error' : "" }}">
            <i> {{ Form::date('fechaInicio',NULL, ['class'=>'form-control','id'=>'url','placeholder'=>'Fecha Inicio de la publicacion']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('fechaInicio', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="col-sm-5">
    <br>
      {!! form::label('Ingrese la Fecha fin:') !!}
      <div class="form-horizontal {{ $errors->has('fechaFin') ? 'has-error' : "" }}">
            <i> {{ Form::date('fechaFin',NULL, ['class'=>'form-control','id'=>'url','placeholder'=>'Fecha Fin de la publicacion']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('fechaFin', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      {!! form::label('imagen','Seleccionar Imagen') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('imagen') ? 'has-error' : "" }}">
        <input type="file" name="imagen"  id="imagen" enctype="multipart/form-data" accept=".jpg">
       
        <div class="help-block" >
        <strong>{{ $errors->first('imagen', '**Ingrese una imagen válida') }}</strong> 
      </div>
      </div>
    </div>
    </div>
</div>
     <div>
      <br>
      <br>
       {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('dominio.index') }}">Cancelar</a>
     </div>
      
   
      
    
     
      <br>
 