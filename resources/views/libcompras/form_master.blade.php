   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Cuenta:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('cuenta') ? 'has-error' : "" }}">
       <i>{{ Form::text('cuenta',NULL, ['class'=>'form-control', 'id'=>'cuenta', 'placeholder'=>'Cuenta','maxlength' => 80]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('cuenta', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>

<div class="row">
    <div class="col-sm-3">
      {!! form::label('Rubro / Descripcion de la cuenta:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('rubroDesc') ? 'has-error' : "" }}">
       <i>{{ Form::text('rubroDesc',NULL, ['class'=>'form-control', 'id'=>'rubroDesc', 'placeholder'=>'Descripcion de la cuenta','maxlength' => 80]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('rubroDesc', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('estatus','Estado') !!}
    </div>
    <div class="col-sm-5">
        <i>{{ Form::select('estatus', ['1'=>'Activo', '0'=>'Inactivo'], null, ['class'=>'form-control']) }}</i>
      </div>
    </div>
 
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('catcuenta.index') }}">Cancelar</a>
    </div>

