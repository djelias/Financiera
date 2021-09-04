   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Nombre de zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('nombreZona') ? 'has-error' : "" }}">
       <i>{{ Form::text('nombreZona',NULL, ['class'=>'form-control','id'=>'nombreZona','placeholder'=>'nombre']) }} </i>
    </div>
  </div>
      </div>
      
  <div class="row">
    <div class="col-sm-3">
      {!! form::label('Lugar de Zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('lugarZona') ? 'has-error' : "" }}">
       <i>{{ Form::text('lugarZona',NULL, ['class'=>'form-control','id'=>'lugarZona','placeholder'=>'lugar de la zona']) }} </i>
    </div>
  </div>
  </div>
 

 <div class="row">
    <div class="col-sm-3">
      {!! form::label('Latitud de Zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('latitudZona') ? 'has-error' : "" }}">
       <i>{{ Form::text('latitudZona',NULL, ['class'=>'form-control','id'=>'latitudZona','placeholder'=>'latitud de la zona']) }} </i>
    </div>
  </div>
  </div>

 <div class="row">
    <div class="col-sm-3">
      {!! form::label('Longitud de Zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('longitudZona') ? 'has-error' : "" }}">
       <i>{{ Form::text('longitudZona',NULL, ['class'=>'form-control','id'=>'longitudZona','placeholder'=>'longitud de la zona']) }} </i>
    </div>
  </div>
  </div>
  
<div class="row">
    <div class="col-sm-3">
      {!! form::label('Habitat de Zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('habitatZona') ? 'has-error' : "" }}">
       <i>{{ Form::text('habitatZona',NULL, ['class'=>'form-control','id'=>'habitatZona','placeholder'=>'habitat de la zona']) }} </i>
    </div>
  </div>
  </div>
  

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Descripción de Zona') !!}
    </div>
     <div class="col-sm-5">
      <div class="form-group {{ $errors->has('descripcionZona1') ? 'has-error' : "" }}">
       <i>{{ Form::textarea('descripcionZona1',NULL, ['class'=>'form-control','id'=>'descripcionZona1','placeholder'=>'descripcion de la zona']) }} </i>
    </div>
  </div>
  </div>

   <div class="row">
    <div class="col-sm-3">
      {!! form::label('Seleccione el Municipio:') !!}
    </div>
    <div class="col-sm-5">
     <div class="form-group {{ $errors->has('idMunicipio') ? 'has-error' : "" }}">
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
  


    <br>
       <div class="form-group text-center" >
      {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-lg','type'=>'submit']) }}
      <a class="btn btn-danger btn-lg" href="{{ route('zona.index') }}">Cancelar</a>
    </div>

    <!--Script para Colocar guion automatico en numero de DUI-->
