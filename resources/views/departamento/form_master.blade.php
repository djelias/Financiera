   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre de departamento') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreDepto') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreDepto',NULL, ['class'=>'form-control','id'=>'nombreDepto','placeholder'=>'nombre']) }} </i>
    </div>
  </div>
      </div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('departamento.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
