   <div class="row">
    <div class="col-sm-5">
      <br>
      {!! form::label('Ingrese el nombre del riesgo:') !!}
      <div class="form-horizontal {{ $errors->has('catRiesgo') ? 'has-error' : "" }}">
            <i> {{ Form::text('catRiesgo',NULL, ['class'=>'form-control','id'=>'catRiesgo','placeholder'=>'Categoría de Riesgo']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('catRiesgo', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>
     <div>
      <br>
      <br>
       {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('riesgo.index') }}">Cancelar</a>
     </div>
      
   
      </div>
    
     
      <br>
 
