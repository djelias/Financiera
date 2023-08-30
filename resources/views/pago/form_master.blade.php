   <br>
   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Prestatario:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('idprest') ? 'has-error' : "" }}">
       <i>{{ Form::text('idprest',NULL, ['class'=>'form-control','id'=>'idprest','placeholder'=>'Nombre']) }} </i>
    </div>
  </div>

    <div class="col-sm-5">
      {!! form::label('Codigo prestamo:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('idprest2') ? 'has-error' : "" }}">
       <i>{{ Form::text('idprest2',NULL, ['class'=>'form-control','id'=>'idprest2','placeholder'=>'Prestamo']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Fecha de pago:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fechadepago') ? 'has-error' : "" }}">
       <i>{{ Form::text('fechadepago',NULL, ['class'=>'form-control','id'=>'fechadepago','placeholder'=>'Fecha de pago']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Dias de intereses a calcular:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('diasintereses') ? 'has-error' : "" }}">
       <i>{{ Form::text('diasintereses',NULL, ['class'=>'form-control','id'=>'diasintereses','placeholder'=>'Dias intereses']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Cantidad:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : "" }}">
       <i>{{ Form::text('cantidad',NULL, ['class'=>'form-control','id'=>'cantidad','placeholder'=>'Cantidad']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Comentarios:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('comentarios') ? 'has-error' : "" }}">
       <i>{{ Form::text('comentarios',NULL, ['class'=>'form-control','id'=>'comentarios','placeholder'=>'Comentarios']) }} </i>
    </div>
  </div>

  
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
      <a class="btn btn-danger btn-sm" href="{{ route('pago.index') }}">Cancelar</a>
    </div>
      </div>
 
   <br>

    <!--Script para Colocar guion automatico en numero de DUI-->
