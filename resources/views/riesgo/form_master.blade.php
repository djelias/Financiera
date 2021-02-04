   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Categoria de riesgo') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreRiesgo') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreRiesgo',NULL, ['class'=>'form-control','id'=>'nombreRiesgo','placeholder'=>'nombre']) }} </i>
    </div>
  </div>
      </div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('riesgo.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
