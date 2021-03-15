   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Secuencia obtenida') !!}
    </div>

  <div class="col-sm-5">
    <div class="form-group {{ $errors->has('secuenciaObtenida') ? 'has-error' : "" }}">
       <i>{{ Form::text('secuenciaObtenida',NULL, ['class'=>'form-control','id'=>'secuenciaObtenida','placeholder'=>'Secuencia']) }} </i>
    </div>
  </div>
</div>
 
   <div class="row">
    <div class="col-sm-3">
      {!! form::label('seccion','Método de Secuenciación') !!}
    </div>
    <div class="col-sm-5">
     <div class="form-group {{ $errors->has('metodoSecuenciacion') ? 'has-error' : "" }}">           <select name="metodoSecuenciacion" id="metodoSecuenciacion" class="form-control" >
                <option value="" disabled selected>Seleccione Uno </option>
                <option>Método A</option>
                <option>Método B </option>
            </select>
            <div class="help-block" >
        <strong>{{ $errors->first('metodoSecuenciacion', 'Obligatorio') }}</strong> 
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
       <i>{{ Form::time('horaSec',NULL, ['class'=>'form-control','id'=>'horaSec','placeholder'=>'Hora de Secuenciación']) }} </i>
    </div>
   </div>
  </div>
  
  <div class="row">
  <div class="col-sm-3">
      {!! form::label('Fecha') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fechaSec') ? 'has-error' : "" }}">
        <i>{{ Form::date('fechaSec',NULL, ['class'=>'form-control', 'id'=>'fechaSec','type'=>'text', 'placeholder'=>'Fecha(yyyy-mm-dd)']) }} </i>
               <div class="help-block"> 
          <strong>{{ $errors->first('fechaSec', '**Ingrese la Fecha correctamente') }}</strong>
    </div>
   </div>
  </div>
  </div>


  <div class="row">
  <div class="col-sm-3">
      {!! form::label('Responsable') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('responsableSec') ? 'has-error' : "" }}">
       <i>{{ Form::text('responsableSec',NULL, ['class'=>'form-control','id'=>'responsableSec','placeholder'=>'Responsable']) }} </i>
    </div>
   </div>
  </div>
  
  
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('secuencia.index') }}">Cancelar</a>
    </div> 

    <!--Script para Colocar Calendario en español en fecha de secuencia--> 
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
