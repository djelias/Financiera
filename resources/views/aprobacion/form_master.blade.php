   <div class="row">
    <div class="col-sm-5">
      <br>
      {!! form::label('Ingrese Descripcion de la Aprobacion:') !!}
      <div class="form-horizontal {{ $errors->has('descripcion') ? 'has-error' : "" }}">
            <i> {{ Form::text('descripcion',NULL, ['class'=>'form-control','id'=>'descripcion','placeholder'=>'Descripcion']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('descripcion', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="col-sm-5">

      <br>
      {!! form::label('Ingrese las Observaciones:') !!}
      <div class="form-horizontal {{ $errors->has('observacion') ? 'has-error' : "" }}">
            <i> {{ Form::text('observacion',NULL, ['class'=>'form-control','id'=>'observacion','placeholder'=>'Observaciones']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('observacion', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

  <div class="col-sm-5">
    <br>
      {!! form::label('Ingrese el Estado:') !!}
      <div class="form-horizontal {{ $errors->has('estado') ? 'has-error' : "" }}">
            <i> {{ Form::text('estado',NULL, ['class'=>'form-control','id'=>'estado','placeholder'=>'Estado']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('estado', 'Ingrese los datos correctamente') }}
      </div>
    </div>
  </div>

 
</div>
     <div>
      <br>
      <br>
       {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('aprobacion.index') }}">Cancelar</a>
     </div>
      
   
      
    
     
      <br>
 