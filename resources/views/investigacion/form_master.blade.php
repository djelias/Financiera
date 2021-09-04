<div class="row">
    <div class="col-sm-5">
      {!! form::label('Ingrese nombre de la Investigacion:') !!}
    </div>
  <div class="col-sm-5">
    <div class="form-group {{ $errors->has('nombreInv') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreInv',NULL, ['class'=>'form-control','id'=>'nombreInv','placeholder'=>'Nombre Investigacion']) }} </i>
    </div>
  </div>
</div>
 

   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Seleccione la Zona:') !!}
    </div>
    <div class="col-sm-5">
     <div class="form-group { $errors->has('idZona') ? 'has-error' : "" }}">
      <select name="idZona" class="form-control">
                <option disabled selected>Seleccione zona</option>
                @foreach($zonas as $zona)
                      <option value="{{$zona->id}}">{{$zona->nombreZona}}</option>
                 @endforeach
            </select>
            <div class="help-block" >
        <strong>{{ $errors->first('idZona', 'Debe seleccionar una opción') }}</strong> 
      </div>
     </div>
   </div>
  </div>
  

   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Seleccione el Municipio:') !!}
    </div>
    <div class="col-sm-5">
     <div class="form-group { $errors->has('idMunicipio') ? 'has-error' : "" }}">
      <select name="idMunicipio" class="form-control">
                <option disabled selected>Seleccione municipio</option>
                @foreach($municipios as $municipio)
                      <option value="{{$municipio->id}}">{{$municipio->nombreMunicipio}}</option>
                 @endforeach
            </select>
            <div class="help-block" >
        <strong>{{ $errors->first('idMunicipio', 'Debe seleccionar una opción') }}</strong> 
      </div>
     </div>
   </div>
  </div>

   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Seleccione el Tipo de investigacion:') !!}
    </div>
    <div class="col-sm-5">
     <div class="form-group { $errors->has('idTipo') ? 'has-error' : "" }}">
      <select name="idTipo" class="form-control">
                <option disabled selected>Seleccione tipo</option>
                @foreach($tipoInvestigaciones as $tipoInvestigacion)
                      <option value="{{$tipoInvestigacion->id}}">{{$tipoInvestigacion->nombreTipo}}</option>
                 @endforeach
            </select>
            <div class="help-block" >
        <strong>{{ $errors->first('idTipo', 'Debe seleccionar una opción') }}</strong> 
      </div>
     </div>
   </div>
  </div>
<!--
   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Seleccione el Usuario:') !!}
    </div>
    <div class="col-sm-5">
     <div class="form-group { $errors->has('idUsuario') ? 'has-error' : "" }}">
      <select name="idUsuario" class="form-control">
                <option disabled selected>Seleccione Usuario</option>
                @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                 @endforeach
            </select>
            <div class="help-block" >
        <strong>{{ $errors->first('idUsuario', 'Debe seleccionar una opción') }}</strong> 
      </div>
     </div>
   </div>
  </div>
!-- -->
   <div class="row">
    <div class="col-sm-5">
      {!! form::label('Lugar de la investigacion:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('lugarInv') ? 'has-error' : "" }}">
       <i>{{ Form::text('lugarInv',NULL, ['class'=>'form-control','id'=>'lugarInv','placeholder'=>'Lugar de Investigacion']) }} </i>
    </div>
   </div>
  </div>
<br>
  <div class="row">
    <div class="col-sm-5">
      {!! form::label('Responsable de la investigacion:') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('responsableInv') ? 'has-error' : "" }}">
       <i>{{ Form::text('responsableInv',NULL, ['class'=>'form-control','id'=>'responsableInv','placeholder'=>'Responsable de Investigacion']) }} </i>
    </div>
   </div>
  </div>
<br>
  
  <div class="row">
  <div class="col-sm-5">
      {!! form::label('Fecha de Ingreso') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('fechaIngreso') ? 'has-error' : "" }}">
        <i>{{ Form::date('fechaIngreso',NULL, ['class'=>'form-control', 'id'=>'fechaIngreso','type'=>'text', 'placeholder'=>'Fecha(yyyy-mm-dd)']) }} </i>
               <div class="help-block"> 
          <strong>{{ $errors->first('fechaIngreso', '**Ingrese la Fecha correctamente') }}</strong>
    </div>
   </div>
  </div>
  </div>


  <div class="row">
  <div class="col-sm-5">
      {!! form::label('Objetivo de la Investigacion') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('objetivo') ? 'has-error' : "" }}">
       <i>{{ Form::text('objetivo',NULL, ['class'=>'form-control','id'=>'objetivo','placeholder'=>'Objetivo']) }} </i>
    </div>
   </div>
  </div>
  

  <div class="row">
  <div class="col-sm-5">
      {!! form::label('Contacto') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('contacto') ? 'has-error' : "" }}">
       <i>{{ Form::text('contacto',NULL, ['class'=>'form-control','id'=>'contacto','placeholder'=>'Contacto']) }} </i>
    </div>
   </div>
  </div>

  <div class="row">
  <div class="col-sm-5">
      {!! form::label('Unidad Encargada') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('unidadEncargada') ? 'has-error' : "" }}">
       <i>{{ Form::text('unidadEncargada',NULL, ['class'=>'form-control','id'=>'unidadEncargada','placeholder'=>'Unidad Encargada']) }} </i>
    </div>
   </div>
  </div>
  
  <div class="row">
  <div class="col-sm-5">
      {!! form::label('Otras Instituciones') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('otrasInstit') ? 'has-error' : "" }}">
       <i>{{ Form::text('otrasInstit',NULL, ['class'=>'form-control','id'=>'otrasInstit','placeholder'=>'Otras Instituciones']) }} </i>
    </div>
   </div>
  </div>

    
<!-- 
<div class="row">
  <div class="col-sm-5">
      {!! form::label('Documentacion') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('documentacion') ? 'has-error' : "" }}">
       <i>{{ Form::text('documentacion',NULL, ['class'=>'form-control','id'=>'documentacion','placeholder'=>'Documentacion']) }} </i>
    </div>
   </div>
  </div>
  <!-- -->   
<div class="row">
    <div class="col-sm-2">
      {!! form::label('imagen','Seleccionar Documentacion') !!}
    </div>
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('documentacion') ? 'has-error' : "" }}">
        <input type="file" name="documentacion"  id="documentacion" enctype="multipart/form-data" accept=".pdf">
       
        <div class="help-block" >
        <strong>{{ $errors->first('imagen', '**Ingrese una imagen válida') }}</strong> 
      </div>
      </div>
    </div>
    </div>
<div class="row">
  <div class="col-sm-5">
      {!! form::label('Descripcion Investigacion') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('descripcionInvestigacion') ? 'has-error' : "" }}">
       <i>{{ Form::text('descripcionInvestigacion',NULL, ['class'=>'form-control','id'=>'descripcionInvestigacion','placeholder'=>'Descripcion Investigacion']) }} </i>
    </div>
   </div>
  </div>

<div class="row">
  <div class="col-sm-5">
      {!! form::label('Correo Electronico') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('correoElectronico') ? 'has-error' : "" }}">
       <i>{{ Form::text('correoElectronico',NULL, ['class'=>'form-control','id'=>'correoElectronico','placeholder'=>'Correo Electronico']) }} </i>
    </div>
   </div>
  </div>

<!--
 <form class="form-group" method="POST" action="/investigacion" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="">archivo</label>
    <input type="file" name="archivo">
   </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
              
          
             
          </form>

--> 

  
    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
      <a class="btn btn-danger btn-sm" href="{{ route('investigacion.index') }}">Cancelar</a>
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
