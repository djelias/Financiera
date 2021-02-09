   <div class="row">
    <div class="col-sm-4">
      {!! form::label('Categoria de riesgo') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-horizontal{{ $errors->has('catRiesgo') ? 'has-error' : "" }}">
       <i>{{ Form::text('catRiesgo',NULL, ['class'=>'form-control','id'=>'catRiesgo','placeholder'=>'Categoria de Riesgo']) }} </i>
          {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('riesgo.index') }}">Cancelar</a>
    </div>
    </div>
      </div>
     
      <br>
 
