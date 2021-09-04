<div class="row">
  <br>
     <div class="col-sm-4">
       {!! form::label('Ingrese nombre de la especie') !!}
      <div class="form-horizontal {{ $errors->has('nombreEspecie') ? 'has-error' : "" }}">
            <i> {{ Form::text('nomEspamen',NULL, ['class'=>'form-control','id'=>'nombre','placeholder'=>'Nombre de la Especie']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nomEspamen', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      <div class="col-sm-4">
       {!! form::label('Ingrese nombre común:') !!}
      <div class="form-horizontal {{ $errors->has('nombreEspecie') ? 'has-error' : "" }}">
            <i> {{ Form::text('nomComEspamen',NULL, ['class'=>'form-control','id'=>'nombre','placeholder'=>'Nombre común']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nomComEspamen', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
      
     <div class="col-sm-4">
      <div class="form-horizontal {{ $errors->has('idRiesgo') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el nivel de riesgo:') !!}
      <select name="idRiesgo" class="form-control">
                <option disabled selected>Nivel de riesgo </option>
                @foreach($riesgos as $riesgo)
                      <option value="{{$riesgo->id}}">{{$riesgo->catRiesgo}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idRiesgo', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('especieAmenazada.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      