   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Secuencia obtenida') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreSecuencia') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreSecuencia',NULL, ['class'=>'form-control','id'=>'nombreSecuencia','placeholder'=>'Secuencia']) }} </i>
    </div>
  </div>
      </div>
 
   <div class="row">
    <div class="col-sm-3">
      {!! form::label('seccion','Método de Secuenciación') !!}
    </div>
    <div class="col-sm-4">
         <div class="form-group {{ $errors->has('seccion') ? 'has-error' : "" }}">
           <select name="seccion" id="seccion" class="form-control" >
                <option value="" disabled selected>Seleccione uno</option>
                <option>Método 1</option>
                <option>Método 2 </option>
            </select>
            <div class="help-block" >
        <strong>{{ $errors->first('seccion', 'Obligatorio') }}</strong> 
      </div>
        </div>
   </div>
  </div>
   <div class="row">
  <div class="col-sm-3">
      {!! form::label('Lugar de la Secuenciación') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('lugarSec') ? 'has-error' : "" }}">
       <i>{{ Form::text('lugarSec',NULL, ['class'=>'form-control','id'=>'lugarSec','placeholder'=>'Lugar Secuencia']) }} </i>
    </div>
   </div>
  </div>

   <div class="row">
  <div class="col-sm-3">
      {!! form::label('Hora') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('horaSec') ? 'has-error' : "" }}">
       <i>{{ Form::text('horaSec',NULL, ['class'=>'form-control','id'=>'horaSec','placeholder'=>'Hora de Secuenciación']) }} </i>
    </div>
   </div>
  </div>
  
  <div class="row">
  <div class="col-sm-3">
      {!! form::label('Fecha') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fechaSec') ? 'has-error' : "" }}">
       <i>{{ Form::text('lugarSec',NULL, ['class'=>'form-control','id'=>'fechaSec','placeholder'=>'Fechaa de Secuenciación']) }} </i>
    </div>
   </div>
  </div>


    <div class="row">
  <div class="col-sm-3">
      {!! form::label('Responsable') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('responsable') ? 'has-error' : "" }}">
       <i>{{ Form::text('responsable',NULL, ['class'=>'form-control','id'=>'responsable','placeholder'=>'Responsable']) }} </i>
    </div>
   </div>
  </div>
  
  
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('secuencia.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
