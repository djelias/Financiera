<div class="row">
    <div class="col-sm-7">
      <br>
       {!! form::label('Ingrese Nombre Científico de la Especie:') !!}
   </div>
   <div class="col-sm-7">
      <div class="form-group {{ $errors->has('nomEspamen') ? 'has-error' : "" }}">
            <i> {{ Form::text('nomEspamen',NULL, ['class'=>'form-control','id'=>'nomEspamen','placeholder'=>'Nombre Científico de la especie Amenazada']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nomEspamen', 'Ingrese los datos correctamente') }}
       </div>
     </div>
  </div>
 </div>

 <div class="row">
           <div class="col-sm-7" >
       {!! form::label('Ingrese Nombre Común de la Especie:') !!}
      <div class="form-group {{ $errors->has('nomComEspamen') ? 'has-error' : "" }}">
            <i> {{ Form::text('nomComEspamen',NULL, ['class'=>'form-control','id'=>'nomComEspamen','placeholder'=>'Nombre Común de la especie amenazada']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nomComEspamen', 'Ingrese los datos correctamente') }}
          </div>
        </div>
      </div>
  </div>

<div class="row">
  <div class="col-sm-7" >
  <div class="form-group {{ $errors->has('idRiesgo') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el Riesgo:') !!}
      <select name="idRiesgo" class="form-control">
                <option disabled selected>Seleccione Riesgo</option>
                @foreach($riesgos as $riesgo)
                      <option value="{{$riesgo->id}}">{{$riesgo->catRiesgo}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idRiesgo', 'Debe seleccionar una opción') }}
      </div>          
    </div>
  </div>
</div>


      <br>
      <div class="form-group text-center" >
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-default','type'=>'submit']) }}
        <a class="btn btn-danger btn-default" href="{{ route('especieAmenazada.index') }}">Cancelar</a>
      </div> 
      
    
     
     
