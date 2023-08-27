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
      <div class="form-group {{ $errors->has('codigoPrestamo') ? 'has-error' : "" }}">
       <i>{{ Form::text('codigoPrestamo',NULL, ['class'=>'form-control','id'=>'codigoPrestamo','placeholder'=>'Codigo']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Periodicidad:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('periodicidad') ? 'has-error' : "" }}">
       <i>{{ Form::text('periodicidad',NULL, ['class'=>'form-control','id'=>'periodicidad','placeholder'=>'Periodicidad']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Tiempo (En años):') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('tiempo') ? 'has-error' : "" }}">
       <i>{{ Form::text('tiempo',NULL, ['class'=>'form-control','id'=>'tiempo','placeholder'=>'Duracion']) }} </i>
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
      {!! form::label('Tasa de intereses:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('tasa') ? 'has-error' : "" }}">
       <i>{{ Form::text('tasa',NULL, ['class'=>'form-control','id'=>'tasa','placeholder'=>'Intereses']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Descripcion:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('descrip') ? 'has-error' : "" }}">
       <i>{{ Form::text('descrip',NULL, ['class'=>'form-control','id'=>'descrip','placeholder'=>'Descripcion']) }} </i>
    </div>
  </div>

  <h3>Informacion sobre el pago</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

  <div class="col-sm-5">
      {!! form::label('Cuota de pago:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('pago') ? 'has-error' : "" }}">
       <i>{{ Form::text('pago',NULL, ['class'=>'form-control','id'=>'pago','placeholder'=>'Cuota']) }} </i>
    </div>
  </div>

  <div class="col-sm-5">
      {!! form::label('Fecha de pago:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fechadePago') ? 'has-error' : "" }}">
       <i>{{ Form::text('fechadePago',NULL, ['class'=>'form-control','id'=>'fechadePago','placeholder'=>'Fecha de pago']) }} </i>
    </div>
  </div>

 

       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
      <a class="btn btn-danger btn-sm" href="{{ route('prestamo.index') }}">Cancelar</a>
    </div>
      </div>
 
   <br>

    <!--Script para Colocar guion automatico en numero de DUI-->
