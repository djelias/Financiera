   <div class="row">
    <div class="col-sm-5">
      <br>
      {!! form::label('Ingrese el nombre del dominio:') !!}
      <div class="form-horizontal {{ $errors->has('nombreDominio') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreDominio',NULL, ['class'=>'form-control','id'=>'nombreDominio','placeholder'=>'Nombre de dominio']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreDominio', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>
     <div>
      <br>
      <br>
       {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('dominio.index') }}">Cancelar</a>
     </div>
      
   
      </div>
    
     
      <br>
 
