   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombres:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombres') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombres',NULL, ['class'=>'form-control', 'id'=>'nombres', 'placeholder'=>'Nombres del prestatario','maxlength' => 30]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('nombres', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>
 <div class="row">
    <div class="col-sm-3">
      {!! form::label('Apellidos:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : "" }}">
       <i>{{ Form::text('apellidos',NULL, ['class'=>'form-control', 'id'=>'apellidos', 'placeholder'=>'Apellidos del prestatario','maxlength' => 30]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('apellidos', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>

<div class="row">
    <div class="col-sm-3">
      {!! form::label('Correo electronico:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('telefono') ? 'has-error' : "" }}">
       <i>{{ Form::email('email',NULL, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Correo electronico','maxlength' => 30]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('email', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('dui','No. de DUI') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('dui') ? 'has-error' : "" }}">
       <i>{{ Form::text('dui',NULL, ['class'=>'form-control','id'=>'dui','placeholder'=>'xxxxxxxx-x','maxlength' => 10]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('dui', 'Ingrese DUI correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>

<div class="row">
    <div class="col-sm-3">
      {!! form::label('Fecha de nacimiento:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('telefono') ? 'has-error' : "" }}">
       <i>{{ Form::date('fnacimiento',NULL, ['class'=>'form-control', 'id'=>'fnacimiento', 'placeholder'=>'Fecha nacimiento del prestatario','maxlength' => 30]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('fnacimiento', 'Ingrese nombre correctamente') }}</strong>
      </div>
    </div>
  </div>
 </div>

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('telefono','Teléfono') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-group {{ $errors->has('telefono') ? 'has-error' : "" }}">
       <i>{{ Form::text('telefono',NULL, ['class'=>'form-control', 'id'=>'telefono', 'placeholder'=>'xxxxxxxx','maxlength' => 9]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('telefono', 'Ingrese Teléfono correctamente') }}</strong>
      </div>
    </div>
  </div>
      </div>
   <div class="row">
    <div class="col-sm-3">
      {!! form::label('direccion1','Direccion 1') !!}
    </div>
    <div class="col-sm-8">
    <div class="form-group {{ $errors->has('direccion1') ? 'has-error' : "" }}">
      <i>{{Form :: text ('direccion1', NULL, ['class'=>'form-control', 'id'=>'direccion1', 'placeholder'=>'Direccion 1'])}}</i>
        <div class="help-block"> 
          <strong>{{ $errors->first('direccion1', 'Ingrese Direccion correctamente') }}</strong>
    </div>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('direccion2','Direccion 2') !!}
    </div>
    <div class="col-sm-8">
    <div class="form-group {{ $errors->has('direccion2') ? 'has-error' : "" }}">
      <i>{{Form :: text ('direccion2', NULL, ['class'=>'form-control', 'id'=>'direccion2', 'placeholder'=>'Direccion 2'])}}</i>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-3">
      {!! form::label('Comentarios:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('comentarios') ? 'has-error' : "" }}">
       <i>{{ Form::text('comentarios',NULL, ['class'=>'form-control', 'id'=>'comentarios', 'placeholder'=>'comentarios del prestatario','maxlength' => 30]) }} </i> 
        <div class="help-block"> 
          <strong>{{ $errors->first('comentarios', 'Ingrese nombre correctamente') }}</strong>
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
      <a class="btn btn-danger btn-lg" href="{{ route('prestatario.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
<script type="text/javascript">
  $(document).ready(Principal);
    function Principal(){
        var flag1 = true;
        $(document).on('keyup','[id=dui]',function(e){
            if($(this).val().length == 8 && flag1) {
                $(this).val($(this).val()+"-");
                flag1 = false;
            }
        });
    }
</script> 