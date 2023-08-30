<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre de la Familia') !!}
      <div class="form-horizontal {{ $errors->has('nombreFamilia') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreFamilia',NULL, ['class'=>'form-control','id'=>'nombreFamilia','placeholder'=>'Nombre de la familia']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreFamilia', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idOrden') ? 'has-error' : "" }}">
        {!! form::label('Seleccione la Orden:') !!}
      <select name="idOrden" class="form-control">
                <option disabled selected>Seleccione Orden </option>
                @foreach($ordens as $orden)
                      <option value="{{$orden->id}}">{{$orden->nombreOrden}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idOrden', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('familia.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      
