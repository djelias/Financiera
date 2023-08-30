<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre del Municipio:') !!}
      <div class="form-horizontal {{ $errors->has('nombreMunicipio') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreMunicipio',NULL, ['class'=>'form-control','id'=>'nombreMunicipio','placeholder'=>'Nombre del municipio']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreMunicipio', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idDominio') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el Departamento:') !!}
      <select name="idDepto" class="form-control">
                <option disabled selected>Seleccione departamento</option>
                @foreach($departamentos as $departamento)
                      <option value="{{$departamento->id}}">{{$departamento->nombreDepto}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idDepto', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('municipio.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
