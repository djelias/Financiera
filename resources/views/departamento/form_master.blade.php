
<div class="row">
    <div class="col-sm-5">
      <br>
      {!! form::label('Ingrese el nombre del Deparatamento:') !!}
      <div class="form-horizontal {{ $errors->has('nombreDepto') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreDepto',NULL, ['class'=>'form-control','id'=>'nombreDepto','placeholder'=>'Nombre de departamento']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreDepto', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>
     <div>
      <br>
      <br>
       {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('departamento.index') }}">Cancelar</a>
     </div>
      
   
      </div>
    
     
      <br>