<div class="row">
    <div class="col-sm-4">
       {!! form::label('Ingrese el Número de Voucher:') !!}
   
      <div class="form-group {{ $errors->has('numVoucher') ? 'has-error' : "" }}">
            <i> {{ Form::text('numVoucher',NULL, ['class'=>'form-control','id'=>'numVoucher','placeholder'=>'Número de Voucher ']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('numVoucher', 'Ingrese los datos correctamente') }}
       </div>
     </div>
  </div>

  <div class="col-sm-4" >
  <div class="form-group {{ $errors->has('idEspecimen') ? 'has-error' : "" }}">
        {!! form::label('Código del especimen:') !!}
      <i><datalist name="idEspecimen" id="idEspecimen">
                  @foreach($especimens as $especimen)
                      <option value="{{$especimen->id}}">{{$especimen->codigoEspecimen}}</option>
                 @endforeach
            </datalist></i>
      <i>{{ Form::text('idEspecimen',NULL, ['class'=>'form-control', 'list'=>'idEspecimen', 'placeholder'=>'Código de Especimen']) }}</i>         
            <div class="help-block" > 
          {{ $errors->first('idEspecimen', 'Debe seleccionar una opción') }}
      </div>          
    </div>
  </div>

           <div class="col-sm-4" >
       {!! form::label('Nombre Común de la especie:') !!}
      <div class="form-group {{ $errors->has('nombreComun') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreComun',NULL, ['class'=>'form-control','id'=>'nombreComun','placeholder'=>'Nombre Común de la especie']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreComun', 'Ingrese los datos correctamente') }}
          </div>
        </div>
      </div>
  

      <br>
     </div>  
      <div class="form-group" >
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-default','type'=>'submit']) }}
        <a class="btn btn-danger btn-default" href="{{ route('taxonomia.index') }}">Cancelar</a>
      </div> 
    
     
     
      