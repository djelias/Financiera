   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre de Tipo de Investigación') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreTipo') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreTipo',NULL, ['class'=>'form-control','id'=>'nombreTipo','placeholder'=>'nombre']) }} </i>
    </div>
  </div>
      </div>

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Descripción Tipo de Investigación') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('descripcionTipo') ? 'has-error' : "" }}">
       <i>{{ Form::text('descripcionTipo',NULL, ['class'=>'form-control','id'=>'descripcionTipo','placeholder'=>'descripcion']) }} </i>
    </div>
  </div>
</div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('tipoInvestigacion.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
