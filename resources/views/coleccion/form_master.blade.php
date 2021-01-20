   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre de coleccion') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreColeccion') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreColeccion',NULL, ['class'=>'form-control','id'=>'nombreColeccion','placeholder'=>'nombre']) }} </i>
    </div>
  </div>
      </div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('coleccion.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
