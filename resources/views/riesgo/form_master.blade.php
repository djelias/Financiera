   <div class="row">
    <div class="col-sm-4">
      {!! form::label('Categoria de riesgo') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('catRiesgo') ? 'has-error' : "" }}">
       <i>{{ Form::text('catRiesgo',NULL, ['class'=>'form-control','id'=>'catRiesgo','placeholder'=>'nombre']) }} </i>
    </div>
      </div>
     
      <br>
 
