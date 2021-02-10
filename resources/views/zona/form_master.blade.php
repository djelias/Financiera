   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre de zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreZona') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreZona',NULL, ['class'=>'form-control','id'=>'nombreZona','placeholder'=>'nombre']) }} </i>
    </div>
  </div>
      </div>
  <div class="row">
    <div class="col-sm-3">
      {!! form::label('Descripción de Zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('descripcionZona1') ? 'has-error' : "" }}">
       <i>{{ Form::text('descripcionZona1',NULL, ['class'=>'form-control','id'=>'descripcionZona1','placeholder'=>'descripcion de la zona']) }} </i>
    </div>
  </div>
  </div>
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('zona.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
