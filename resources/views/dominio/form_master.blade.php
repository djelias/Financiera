   <div class="row">
    <div class="col-sm-4">
      <br>
      {!! form::label('Ingrese el nombre del dominio:') !!}
    </div>
     <div class="col-sm-4">
      <div class="form-horizontal {{ $errors->has('nombreDominio') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreDominio',NULL, ['class'=>'form-control','id'=>'nombreDominio','placeholder'=>'Nombre de dominio']) }}  </i> 
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('dominio.index') }}">Cancelar</a>
    </div>
      </div>
      </div>
     
      <br>
 
