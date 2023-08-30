   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Subcuenta:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('subcuenta') ? 'has-error' : "" }}">
       <i>{{ Form::text('subcuenta',NULL, ['class'=>'form-control', 'id'=>'subcuenta', 'placeholder'=>'Subcuenta','maxlength' => 80]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('subcuenta', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>

<div class="row">
    <div class="col-sm-3">
      {!! form::label('Rubro / Descripcion de la Subcuenta:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('rubroDesc') ? 'has-error' : "" }}">
       <i>{{ Form::text('rubroDesc',NULL, ['class'=>'form-control', 'id'=>'rubroDesc', 'placeholder'=>'Descripcion de la Subcuenta','maxlength' => 80]) }} </i> 
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

