<div class="row">
    <div class="col-sm-7">
       {!! form::label('Ingrese el Número de Voucher:') !!}
   </div>
   <div class="col-sm-7">
      <div class="form-group {{ $errors->has('NumVoucher') ? 'has-error' : "" }}">
            <i> {{ Form::text('NumVoucher',NULL, ['class'=>'form-control','id'=>'NumVoucher','placeholder'=>'Número de Voucher ']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('NumVoucher', 'Ingrese los datos correctamente') }}
       </div>
     </div>
  </div>
 </div>

 <div class="row">
  <div class="col-sm-7" >
  <div class="form-group {{ $errors->has('idDominio') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el Dominio:') !!}
      <select name="idDominio" class="form-control">
                <option disabled selected>Seleccione Dominio</option>
                @foreach($dominios as $dominio)
                      <option value="{{$dominio->id}}">{{$dominio->nombreDominio}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idDominio', 'Debe seleccionar una opción') }}
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
      
    
     
     
      