<div class="row">
    <div class="col-sm-2">
      {!! form::label('codigoEspecimen','Código Especímen') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('codigoEspecimen') ? 'has-error' : "" }}">
       <i>{{ Form::text('codigoEspecimen',NULL, ['class'=>'form-control', 'id'=>'codigoEspecimen', 'placeholder'=>'Código de Especíme']) }}</i> 
        <div class="help-block" > 
          <strong>{{ $errors->first('codigoEspecimen', '**Ingrese datos válidos') }}</strong>
      </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      {!! form::label('idEspecie','Especie') !!}
    </div>
    <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idEspecie') ? 'has-error' : "" }}">
      <select name="idEspecie" class="form-control">
                <option disabled selected>Seleccione especie </option>
                @foreach($especies as $especie)
                      <option value="{{$especie->id}}">{{$especie->nombreEspecie}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idEspecie', 'Debe seleccionar una opción') }}
      </div>          
 </div>
  </div>
</div>

  <div class="row">
    <div class="col-sm-2">
      {!! form::label('cantidad','Cantidad') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : "" }}">
        <i>{{ Form::text('cantidad',NULL, ['class'=>'form-control', 'id'=>'cantidad', 'placeholder'=>'Cantidad de Muestras']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('cantidad', '**Ingrese un número válido') }}</strong> 
      </div>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-2">
      {!! form::label('caracteristicas','Caracteristicas') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('caracteristicas') ? 'has-error' : "" }}">
        <i>{{ Form::textarea('caracteristicas',NULL, ['class'=>'form-control', 'id'=>'caracteristicas', 'placeholder'=>'Caracteristicas de la muestra']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('caracteristicas', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

     <div class="row">
    <div class="col-sm-2">
      {!! form::label('colector','Colector') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('colector') ? 'has-error' : "" }}">
        <i>{{ Form::text('colector',NULL, ['class'=>'form-control', 'id'=>'colector', 'placeholder'=>'Colector']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('colector', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

     <div class="row">
    <div class="col-sm-2">
      {!! form::label('fechaColecta','Fecha de colecta') !!}
    </div>
    <div class="col-sm-5">
      <div class="input-group {{ $errors->has('fechaColecta') ? 'has-error' : "" }}">
       <i>{{ Form::date('fechaColecta',NULL, ['class'=>'form-control', 'id'=>'fechaColecta','type'=>'text', 'placeholder'=>'Fecha(yyyy-mm-dd)']) }} </i>
               <div class="help-block"> 
          <strong>{{ $errors->first('fechaColecta', '**Ingrese la Fecha correctamente') }}</strong>
      </div>
    </div>
  </div>
  </div>

   <div class="row">
    <div class="col-sm-2">
      {!! form::label('habitat','Habitat') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('habitat') ? 'has-error' : "" }}">
        <i>{{ Form::text('habitat',NULL, ['class'=>'form-control', 'id'=>'habitat', 'placeholder'=>'Habitat']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('habitat', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-2">
      {!! form::label('horaSecuenciacion1','Hora de secuenciación') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('horaSecuenciacion1') ? 'has-error' : "" }}">
        <i>{{ Form::text('horaSecuenciacion1',NULL, ['class'=>'form-control', 'id'=>'horaSecuenciacion1', 'placeholder'=>'HH:mm:ss']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('horaSecuenciacion1', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-2">
      {!! form::label('latitud','Latitud') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('latitud') ? 'has-error' : "" }}">
        <i>{{ Form::text('latitud',NULL, ['class'=>'form-control', 'id'=>'latitud', 'placeholder'=>'latitud']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('latitud', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

  <div class="row">
    <div class="col-sm-2">
      {!! form::label('longitud','Longitud') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('longitud') ? 'has-error' : "" }}">
        <i>{{ Form::text('longitud',NULL, ['class'=>'form-control', 'id'=>'longitud', 'placeholder'=>'longitud']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('longitud', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

     <div class="row">
    <div class="col-sm-2">
      {!! form::label('peso','Peso') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('peso') ? 'has-error' : "" }}">
        <i>{{ Form::text('peso',NULL, ['class'=>'form-control', 'id'=>'peso', 'placeholder'=>'peso']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('peso', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>
  
      <div class="row">
    <div class="col-sm-2">
      {!! form::label('tamano','Tamaño') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('tamano') ? 'has-error' : "" }}">
        <i>{{ Form::text('tamano',NULL, ['class'=>'form-control', 'id'=>'tamano', 'placeholder'=>'Tamaño']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('tamano', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

     <div class="row">
    <div class="col-sm-2">
      {!! form::label('tecnicaRecoleccion','Técnica de Recolección') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('tecnicaRecoleccion') ? 'has-error' : "" }}">
        <i>{{ Form::text('tecnicaRecoleccion',NULL, ['class'=>'form-control', 'id'=>'tecnicaRecoleccion', 'placeholder'=>'Técnica de Recolección']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('tecnicaRecolección', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-2">
      {!! form::label('tipoMuestra','Tipo de Muestra') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('tipoMuestra') ? 'has-error' : "" }}">
        <i>{{ Form::text('tipoMuestra',NULL, ['class'=>'form-control', 'id'=>'tipoMuestra', 'placeholder'=>'Técnica de Muestra']) }}</i>
        <div class="help-block" >
        <strong>{{ $errors->first('tipoMuestra', '**Ingrese datos válidos') }}</strong> 
      </div>
      </div>
    </div>
    </div>

   <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('especimen.index') }}">Cancelar</a>
   </div>

  
 
   <!--Script para Colocar Calendario en español en fecha de nacimiento--> 
<script>
          $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            changeMonth: true,
            changeYear: true,
            yearRange: '-30:+0',
            weekHeader: 'Sm',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
         };
   $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function () {
            $("#miento").datepicker();
        });
</script>